<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')->get();
        return response()->json($projects);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);

    }

    public function getProjectImages($id)
    {
        $project = Project::with('images')->findOrFail($id);

        $images = $project->images->map(function($image) {
            return [
                'id' => $image->id,
                'path' => asset('storage/' . $image->image_path)
            ];
        });

        return response()->json($images);
    }

    public function store(ProjectStoreRequest $request)
    {
        try {
            $lastOrder = DB::table('projects')->max('sort_order') ?? -1;
            $projectSlug = Str::slug($request->title);
            $projectFolder = 'images/' . $projectSlug;

            $coverImagePath = $request->file('cover_image')->store($projectFolder, 'public');

            $project = Project::create([
                'title' => $request->title,
                'full_title' => $request->full_title,
                'location' => $request->location,
                'author' => $request->author,
                'phase' => $request->phase,
                'rating' => $request->rating,
                'project_type' => $request->project_type,
                'annotation' => $request->annotation,
                'description' => $request->description,
                'scope_of_work' => $request->scope_of_work,
                'date' => $request->date,
                'cover_image' => 'storage/app/public/' . $coverImagePath,
                'sort_order' => $lastOrder + 1
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store($projectFolder . '/img', 'public');
                    $project->images()->create([
                        'image_path' => $imagePath
                    ]);
                }
            }
            return response()->json([
                'message' => 'Projekt byl úspěšně vytvořen',
                'project' => $project
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Něco se pokazilo',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);

            $updateData = [
                'title' => $request->input('title'),
                'full_title' => $request->input('full_title'),
                'location' => $request->input('location'),
                'author' => $request->input('author'),
                'phase' => $request->input('phase'),
                'rating' => $request->input('rating'),
                'project_type' => $request->input('project_type'),
                'annotation' => $request->input('annotation'),
                'description' => $request->input('description'),
                'scope_of_work' => $request->input('scope_of_work'),
                'date' => $request->input('date'),
            ];

            if ($request->hasFile('cover_image')) {
                if ($project->cover_image) {
                    Storage::disk('public')->delete(str_replace('storage/app/public/', '', $project->cover_image));
                }

                $projectFolder = 'images/' . Str::slug($request->title ?? $project->title);
                $coverImagePath = $request->file('cover_image')->store($projectFolder, 'public');
                $updateData['cover_image'] = 'storage/app/public/' . $coverImagePath;
            }

            $updateData = array_filter($updateData, function($value) {
                return $value !== null;
            });

            $project->fill($updateData);
            $project->save();

            return response()->json([
                'message' => 'Projekt byl úspěšně aktualizován',
                'project' => $project->fresh()
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Došlo k chybě při aktualizaci projektu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);

            if ($project->cover_image) {
                Storage::disk('public')->delete(str_replace('storage/app/public/', '', $project->cover_image));
            }

            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image->image_path);
            }

            $project->delete();

            return response()->json(['message' => 'Projekt byl úspěšně smazán']);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Došlo k chybě při mazání projektu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteImage($projectId, $imageId)
    {
        try {
            $project = Project::findOrFail($projectId);
            $image = ProjectImage::findOrFail($imageId);

            if ($image->project_id !== $project->id) {
                Log::warning('Unauthorized delete attempt', [
                    'project_id' => $projectId,
                    'image_project_id' => $image->project_id
                ]);
                return response()->json(['message' => 'Unauthorized'], 403);
            }

            Storage::disk('public')->delete($image->image_path);
            $image->delete();

            return response()->json(['message' => 'Obrázek byl úspěšně smazán']);
        } catch (Exception $e) {
            Log::error('Error deleting image:', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Došlo k chybě při mazání obrázku',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function addImages(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);
            $projectFolder = 'images/' . Str::slug($project->title);

            if ($request->hasFile('cover_image')) {
                if ($project->cover_image) {
                    Storage::disk('public')->delete(str_replace('storage/app/public/', '', $project->cover_image));
                }

                $coverImagePath = $request->file('cover_image')->store($projectFolder, 'public');
                $project->cover_image = 'storage/app/public/' . $coverImagePath;
                $project->save();
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store($projectFolder . '/img', 'public');
                    $project->images()->create([
                        'image_path' => $imagePath
                    ]);
                }
            }

            return response()->json([
                'message' => 'Obrázky byly úspěšně přidány'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Došlo k chybě při nahrávání obrázků',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function reorder(Request $request)
    {
        try {
            $request->validate([
                'order' => 'required|array',
                'order.*.id' => 'required|exists:projects,id',
                'order.*.sort_order' => 'required|integer|min:0',
            ]);

            foreach ($request->order as $item) {
                Project::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
            }
            return response()->json(['message' => 'Projekty byly úspěšně seřazeny']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update order'], 500);
        }
    }
}
