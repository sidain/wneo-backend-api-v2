<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class _builder extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name',
        'street',
        'city',
        'state',
        'zip',
        'country',
        'site',
        'logo',
        'builder_id',
        'builder',
        'id',
        'categorys',
        'categorys_json'
    ];


    public function products(){
        // return $this->hasMany('App\Models\_product', 'builder_id', 'builder_id' );

        return $this->hasMany('App\Models\_product', 'builder_id', 'builder_id');
    }
}
