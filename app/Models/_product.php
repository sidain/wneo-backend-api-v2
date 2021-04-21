<?php

namespace App\Models;

use App\Models\_builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class _product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'product_name',
        'part_number',
        'image1_id',
        'builder_id',
        'product_id',
        'description',
        'excerpt_text',
        'categorys',
        'categorys_json',
    ];


    // public function setCategorysAttribute($value)
    // {
    //     Log::info( "\n\n\n*** SET VALUE=> \n".print_r($value, true) );
    //     Log::info( "\n*** SET ATTRIBUTES=> \n".print_r($this->attributess, true) );

    //     // Log::info("*** BUILDER_ID {$this->attributes['builder_id']}");
    //     // Log::info("*** VALUE =>".print_r($value, true));
    //     // Log::info("*** CATEGORYS =>".print_r( json_decode($this->attributes['categorys']), true));


    //     /**
    //      *
    //      */

    //     // add categories

    //     // remove categories




    //     // $this->attributes['categorys'] = json_encode($value);
    //     $this->attributes['categorys_json'] = json_encode($value);
    // }

    // public function getCategorysAttribute($value)
    // public function getCategorysAttribute()
    // {
    //     // Log::info( "\n\n\n*** GET VALUE=> \n".print_r($value, true) );
    //     // Log::info( "\n*** GET ATTRIBUTES=> \n".print_r($this->attributess, true) );
    //     Log::info( "\n*** GET ATTRIBUTES=> \n".print_r($this, true) );

    //     // error_log( print_r($value, true) );
    //     // error_log( gettype($value) );

    //     // if ( gettype($value) === 'array' ) {
    //     //     $value = json_encode($value);
    //     // }

    //     // return $this->attributes['categorys'] = json_decode($value);

    //     // return $this->attributes['categorys_json'] = json_decode($value);
    //     // return json_decode($this->attributes['categorys_json']);

    //     return $this->getCategorysJsonAttribute();

    //     // return json_decode($this->attributes['categorys']);
    // }

    // public function getCategorysJsonAttribute($value)
    // public function getCategorysJsonAttribute()
    // {
    //     // Log::info( "\n\n\n*** GET VALUE=> \n".print_r($value, true) );
    //     Log::info( "\n*** GET ATTRIBUTES=> \n".print_r($this->attributess, true) );

    //     // error_log( print_r($value, true) );
    //     // error_log( gettype($value) );

    //     // if ( gettype($value) === 'array' ) {
    //     //     $value = json_encode($value);
    //     // }

    //     // return $this->attributes['categorys'] = json_decode($value);

    //     // return $this->attributes['categorys_json'] = json_decode($value);
    //     // return json_decode($this->attributes['categorys_json']);

    //     return json_decode($this->attributes['categorys_json']);
    // }

    public function builder(){
        // return $this->hasOne('App\Models\_builder', 'builder_id', 'builder_id');

        return $this->belongsTo('App\Models\_builder', 'builder_id', 'builder_id' );
    }


    // public function categorys(){
    //     return $this->hasMany('App\Models\_category', 'cat_id', 'cat_id' );
    // }
}
