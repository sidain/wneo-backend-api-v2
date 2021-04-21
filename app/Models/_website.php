<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class _website extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     *
     * id               int
     *
     * url              string
     * wneo_id          string
     * wneo_products    string
     * site_created     string
     * notes
     *
     */


    protected $fillable = [
        'url',
        'wneo_id',
        'wneo_products',
        'builders',
        'site_created',
        'notes',
    ];
}
