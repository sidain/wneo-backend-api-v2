<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class _image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        // 'name',
        // 'url',
        'image_id',
        'image_name',
        'image_type',
        'image_path',
        'image_url',
        'image_source',
        'image_builder_id',
        'image_product_id',
        'image_extension',
    ];
}
