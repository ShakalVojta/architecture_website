<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'full_title',
        'location',
        'author',
        'phase',
        'rating',
        'project_type',
        'supervisor',
        'proposal',
        'implementation',
        'annotation',
        'description',
        'scope_of_work',
        'date',
        'cover_image',
        'images_folder',
        'sort_order'
    ];

    public function images()
    {

        return $this->hasMany(ProjectImage::class);
    }
}
