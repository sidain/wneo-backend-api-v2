<?php


use App\Models\_builder;
use App\Models\_product;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;

use App\Http\Resources\Builder as BuilderResource1;
use App\Http\Resources\Product as ProductResource1;

use App\Http\Resources\BuilderCollection as BuilderResource2;
use App\Http\Resources\ProductCollection as ProductResource2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/home', function () {
//     return view('layouts.base');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('pages.home');
})->name('home');



Route::middleware(['auth:sanctum', 'verified'])
    ->resource('builders', BuilderController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('categorys', CategoryController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('clients', ClientController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('options', OptionController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('products', ProductController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('sites', SiteController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('websites', WebsiteController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('images', ImageController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/images2', [ImageController::class, 'index2'] );



Route::middleware(['auth:sanctum', 'verified'])
    ->resource('users', UserController::class);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('Users', UserController::class);

















// Route::get('/', function () {
//     // return view('welcome');
//     return view('layouts.base');
// });

Route::get('/t', function () {
    return view('pages.t');
});

Route::get('/base', function () {
    return view('layouts.base');
});



Route::get('/options_page', function () {
    return view('options.options');
});

Route::get('/search', function () {
    return view('pages.search');
});

Route::get('/imports', function () {
    return view('pages.imports');
});









// Route::get('/api_page', function () {
//     return view('api_page');
// });

// Route::get('/json_api_page', function () {
//     return view('json_api_page');
// });




Route::get('/dev1', function () {
    return view('pages.dev1');
});

Route::get('/dev2', function () {
    return view('pages.dev2');
});




Route::get('/stuff', function () {
    return view('pages.stuff');
});

Route::get('/test', function () {
    return view('pages.test');
});









// Route::get('/clients/{id}', 'ClientController@show');
// Route::get('/images2', [ImageController::class, 'index2'] );

// Route::resource('builders', BuilderController::class);

// Route::resource('categorys', CategoryController::class); test
// Route::resource('clients', ClientController::class);
// Route::resource('options', OptionController::class);
// Route::resource('products', ProductController::class);
// Route::resource('sites', SiteController::class);
// Route::resource('websites', WebsiteController::class);
// Route::resource('images', ImageController::class);

// Route::resource('users', UserController::class);
// Route::resource('Users', UserController::class);




// Route::get('/productT', function () {
//     return new ProductResource1(_product::find(1));
// });

// Route::get('/productTT', function () {
//     return ProductResource1::collection( _product::all() );
// });

// Route::get('/productTTT', function () {
//     return new ProductResource2(_product::all());
// });





// Route::get('/builderT', function () {
//     return new BuilderResource1(_builder::find(1));
// });

// Route::get('/builderTT', function () {
//     return BuilderResource1::collection( _builder::all() );
// });

// Route::get('/builderTTT', function () {
//     return new BuilderResource2(_builder::all());
// });
