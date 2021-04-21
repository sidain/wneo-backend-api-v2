<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class _site extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'uri',
        'client_id',
        'builder_id',
        'sc_version',
        'wp_version'
    ];
}
