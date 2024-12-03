<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        if ($this->isMethod('PUT')) {
            return [
                'title' => 'sometimes|string|max:255',
                'full_title' => 'sometimes|string|max:255',
                'location' => 'nullable|string|max:255',
                'author' => 'nullable|string|max:255',
                'phase' => 'nullable|string|max:255',
                'rating' => 'nullable|string|max:255',
                'project_type' => 'nullable|string|max:255',
                'annotation' => 'nullable|string',
                'description' => 'nullable|string',
                'scope_of_work' => 'nullable|string',
                'date' => 'nullable|date',
                'supervisor' => 'nullable|string',
                'proposal' => 'nullable|string',
                'implementation' => 'nullable|string',
                'images_folder' => 'nullable|string',
                'cover_image' => 'nullable|string',
                'images.*' => 'nullable|string',
            ];
        }

        return [
            'title' => 'required|string|max:255',
            'full_title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'phase' => 'nullable|string|max:255',
            'rating' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'annotation' => 'nullable|string',
            'description' => 'nullable|string',
            'scope_of_work' => 'nullable|string',
            'date' => 'nullable|date',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Název projektu je povinný',
            'title.string' => 'Název projektu musí být text',
            'full_title.required' => 'Celý název projektu je povinný',
            'full_title.string' => 'Celý název projektu musí být text',
            'cover_image.required' => 'Úvodní obrázek je povinný',
            'cover_image.image' => 'Soubor musí být obrázek',
            'cover_image.mimes' => 'Povolené formáty jsou: jpeg, png, jpg',
            'cover_image.max' => 'Maximální velikost obrázku je 2MB',
            'images.*.image' => 'Soubory musí být obrázky',
            'images.*.mimes' => 'Povolené formáty jsou: jpeg, png, jpg',
            'images.*.max' => 'Maximální velikost obrázku je 10MB',
        ];
    }
}
