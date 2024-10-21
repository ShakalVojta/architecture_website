<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
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
            return asset('storage/' . $image->image_path);
        });

        return response()->json($images);
    }
}
