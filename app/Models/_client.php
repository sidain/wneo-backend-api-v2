<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class _client extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company',
        'street',
        'city',
        'state',
        'zip',
        'country',
        'site'
    ];

    /**
     * id               int
     *
     * name             string
     * address          string
     * wneo_id          int
     * wneo_products    string
     * builders         string
     * website          string
     * username         string
     * password         string
     * site_created     string
     * client_created   string
     */

    /*
     protected $fillable = [
        'name',
        'address',
        'wneo_id',
        'wneo_products',
        'builders',
        'website',
        'username',
        'password',
        'site_created',
        'client_created',
    ];
    */


    /**
     * The table associated with the model.
     *
     * default is n+'s'
     *
     * @var string
     */
    //protected $table = '_clients';

    /**
     * The primary key associated with the table.
     *
     * default is id
     *
     * @var string
     */
    // protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    // public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    // protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = 'U';

    /**
     * If you need to customize the names of the columns used to store the timestamps,
     * you may set the CREATED_AT and UPDATED_AT constants in your model:
     */
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';
}
