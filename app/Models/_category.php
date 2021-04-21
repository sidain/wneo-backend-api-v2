<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class _category extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat',
        'cat_id',
        'cat_name',
        'cat_parent',
        'name',
    ];

    /*
    protected $attributes = [
        'cat_id' => Str::uuid(),
    ];
    */

    /**
     * Set the Cat_ID
     *
     * @param  string  $value
     * @return void
     */
    /*
    public function setCatIDAttribute()
    {
        $this->attributes['cat_id'] = Str::uuid();
        // $this->attributes['cat_id'] = '_'.$this->attributes['id'].'_';
        // error_log("\n\n***_CATEGORY ATTRIBUTES ".print_r($this, true)." ***\n\n\n" );
    }
    */


}
