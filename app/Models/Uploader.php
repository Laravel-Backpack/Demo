<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uploader extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'upload', 'upload_required', 'upload_multiple', 'upload_multiple_required', 'dropzone', 'dropzone_required', 'easymde', 'gallery'];

    protected $casts = [
        'gallery' => 'json',
        'upload_multiple' => 'array',
        'upload_multiple_required' => 'array',
        'dropzone' => 'array',
        'dropzone_required' => 'array',
    ];

}
