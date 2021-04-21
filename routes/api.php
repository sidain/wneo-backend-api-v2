<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


JsonApi::register('default')->routes(function ($api) {
    // $api->resource('builders')->readOnly();
    // $api->resource('products')->readOnly();

    // $api->resource('builders');
    // $api->resource('products');

    /*
    JsonApi::register('default', ['namespace' => 'api'], function($api, $router){
        $api->resource( 'products', [
            'has-one' => 'builder',
            'has-many' => 'categorys',
        ]);
    });
    */

    $api->resource('builders')->relationships(function ($relations) {
        $relations->hasMany('products');
        // $relations->hasMany('categorys');
        // $relations->hasMany('categorys')->uri('categories');
    })->readOnly();

    $api->resource('categorys')->relationships(function ($relations) {
        // $relations->hasMany('builders');
        // $relations->hasMany('products');
    })->readOnly();

    $api->resource('products')->relationships(function ($relations) {
        $relations->hasOne('builders');
        // $relations->hasMany('categorys');
        // $relations->hasMany('categorys')->uri('categories');
    })->readOnly();

});
