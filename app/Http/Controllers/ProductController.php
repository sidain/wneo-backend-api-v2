<?php

namespace App\Http\Controllers;

use App\Models\_image;
use App\Models\_builder;
use App\Models\_product;
use App\Models\_category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = 20;

        $filter_builder = $request->query('filter_builder');
        $filter_category = $request->query('filter_category');
        $_count = _product::count();

        $_builders = _builder::orderBy('builder')->get();
        $_categories = _category::orderBy('cat')->get();

        if ( !empty($filter_builder) && empty($filter_category)  ) {
            // filter by builder
            $items = _product::latest()
                ->where('builder_id', $filter_builder )
                ->paginate($pages);

        }
        else if( empty($filter_builder) && !empty($filter_category) )  {
            //filter by category
            $items = _product::latest()
                ->where('categorys_json', 'like', '%'.$filter_category.'%' )
                ->paginate($pages);

        }
        else if( !empty($filter_builder) && !empty($filter_category) )  {
            //filter by builder and category
            $items = _product::latest()
                ->where('builder_id', $filter_builder )
                ->where('categorys_json', 'like', '%'.$filter_category.'%' )
                ->paginate($pages);
        }
        else{
            $items = _product::latest()
                ->paginate($pages);
        }





        return view('models.products.index')
                ->with('items', $items)
                ->with('_class', new _product)
                ->with('categorys', $_categories )
                ->with('builders', $_builders )
                ->with('filter_builder', $filter_builder )
                ->with('filter_category', $filter_category )
                ->with('_count', $_count )
                ->with('page_count', floor($_count/$pages) )
                ->with('i', (request()->input('page', 1))  );

                //->with('i', (request()->input('page', 1) - 1) * 5);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $_builders = _builder::orderBy('builder')->get();
        $_categories = _category::orderBy('cat')->get();

        return view('models.products.create')
                ->with('_class', new _product)
                ->with('categorys', $_categories )
                ->with('builders', $_builders );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("\n\n\n\n\n\n***PRODUCT STORE BEGIN\n");
        Log::info( print_r( $request->all(), true  ));

        $input = $request->all();

        $new_cats = $request->input('categorys_json');
        $input['categorys_json'] = json_encode($new_cats);


        if ( $request->hasFile('image_file')  ) {
            Log::info("\n\n***PRODUCT STORE FILE\n");

            /*
            $validated = $request->validate([
                'image_name' => 'string|max:40',
                'image_file' => 'mimes:jpeg,png|max:1024',
            ]);
            */

            $image_id = Str::uuid();
            // $image_builder_id = 'test';
            $image_builder_id = $request->input('builder_id');
            $image_product_name = $request->input('product_name');
            $image_product_id = $request->input('product_id');
            $image_og_name = $request->image_file->getClientOriginalName();
            $image_extension  = $request->image_file->extension();

            $image_name =  $image_product_name ?? $image_og_name ?? $image_product_id ??  $image_id ;

            $image_path = "public/products/$image_builder_id/";

            /*
            $request->image_file->storePubliclyAs(
                "$image_path",
                "$image_name.$extension",
            );
            */

            //*** ex *** /var/www/html/storage/app/public/products/257122
            $image_path1 = "public/products/$image_builder_id/";

            $image_path2 = "/var/www/html/storage/app/public/products/$image_builder_id";


            //image_url, dir2
            //*** ex *** storage/products/257122/hutch.jpg
            $image_url = "storage/products/$image_builder_id/$image_name.$image_extension";


            $stored = $request->image_file->storePubliclyAs(
                "$image_path1",
                "$image_name.$image_extension",
            );



            Log::info("\n***PRODUCT STORE FILE NAME\n <>$image_name \n");

            $image_arr = [
                $image_id,
                $image_name,
                $image_path,        // $dir1,   // image_path
                $image_url,         // $dir2,   // image_url
                $image_builder_id,
            ];

            $file = _image::create([
                'image_id' => $image_id,
                'image_name' => $image_name,
                'image_path' => $image_path2,
                'image_url' => $image_url,
                'image_builder_id' => $image_builder_id,
                'image_extension' => $image_extension,
            ]);

            $input['image1_id'] = $image_id;
        }



        // add category amounts
        if( true ){
            $b_id = $input['builder_id'];
            $b = _builder::find($b_id);
            $b_current_cats = json_decode($b->categorys_json);

            $cats_array = [];

            if( $b_current_cats !== null && count((array)$b_current_cats) > 0 ){
                $new_cats_values = ( $new_cats != null ) ? array_values($new_cats) : null ;

                //iterate over all builder cats
                foreach ($b_current_cats as $cat_id => $cat_count) {
                    //test if b_current_cats in new_product_cats
                    if( in_array( $cat_id, $new_cats_values ) ){
                        // PRESENT
                        $cats_array["$cat_id"] = $b_current_cats->$cat_id + 1;
                    }
                    else{
                        $cats_array["$cat_id"] = $b_current_cats->$cat_id;
                    }
                }
            }
            else if( $new_cats !== null){
                // EMPTY CATEGORY ARRAY
                Log::info("*** EMPTY, NEW_CATS =>\n".print_r( $new_cats, true  ));

                foreach ($new_cats as $key => $value) {
                    $cats_array["$value"] = 1;
                    // $cats_array["$value"] += 1;
                    // $cats_array[] = ["$value" => 1] ;

                    # code...
                }
            }


            $b->categorys_json = json_encode( $cats_array );
            $b->save();
        }


        _product::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\_product  $_product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $_item = _product::find($id);

        $_builders = _builder::orderBy('builder')->get();
        $_categories = _category::orderBy('cat')->get();

        return view('models.products.show')
            ->with('_item', $_item)
            ->with('categorys', $_categories )
            ->with('builders', $_builders )
            ->with('_class', new _product);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_product  $_product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $_item = _product::find($id);

        $_builders = _builder::orderBy('builder')->get();
        $_categories = _category::orderBy('cat')->get();

        return view('models.products.edit')
                    ->with('_item', $_item )
                    ->with('_class', new _product)
                    ->with('categorys', $_categories )
                    ->with('builders', $_builders );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_product  $_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Log::info("\n\n\n\n\n\n***PRODUCT UPDATE BEGIN***\n");
        // Log::info("REQUEST => \n". print_r( $request->all(), true  ));

        $item = _product::find($id);
        $input = $request->all();

        $p_cats_new = $request->input('categorys_json');
        $input['categorys_json'] = json_encode($p_cats_new);

        // Log::info( "ITEM \n". print_r( $item, true  ));



        if ( $request->hasFile('image_file')  ) {
            Log::info("\n*** PRODUCT UPDATE REQUEST HAS IMAGE FILE");

            // Log::info( print_r( $item->value('image1_id')  , true  ) ."\n");

            $image = _image::where('image_id', $item->value('image1_id') )->firstOrFail();

            Log::info( print_r( $image->image_id  , true  ) ."\n");

            $image_path = $image->image_path;
            // $_image_name =


            /*
            $validated = $request->validate([
                // 'image_name' => 'string|max:40',
                'name' => 'string|max:100',
                'image_file' => 'mimes:jpeg,jpg,png,gif|max:1024',
            ]);
            */


            // $extension  = $request->image_file->extension();

            // $image_path = $request->image_file->store( 'public/products/'.$input['builder_id'] );

            // $url = Storage::url( $image_path );

            // $request->image_file->storeAs('/public//'.$input['builder_id'], $validated['name'].".".$extension );
            // $url = Storage::url( $input['builder_id'].'/'.$validated['name'].".". $extension );


            /*
            $file = _image::create([
                'name' => $validated['name'],
                'url' => $url,
            ]);

            $input['image1'] = $url;
            */
        }


        // Log::info("PRODUCT UPDATE INPUTS");
        // Log::info( print_r( $input, true  ));

        // $item = _product::find($id);
        // $item->update($request->all());


        // adjust category amounts
        if ( true ) {
            $b_id = $input['builder_id'];
            $b = _builder::find($b_id);
            $b_current_cats = $b->categorys_json;
            $b_current_cats = json_decode($b->categorys_json);

            // Log::info( "b \n".print_r( $b, true  ));
            Log::info( "b_current_cats \n".print_r( $b_current_cats, true  ));


            $p_cats_old = json_decode( $item->categorys_json );

            $cats_diff = array_diff( $p_cats_old, $p_cats_new );


            Log::info( "ARRAY DIFF => \n".print_r( $cats_diff, true  ));


            $cats_array = [];

            //REMOVE from builder cats
            foreach ($b_current_cats as $b_cat_id => $b_cat_value) {
                Log::info("$b_cat_id => $b_cat_value");

                if( in_array( $b_cat_id, $p_cats_old ) ){
                    $cats_array["$b_cat_id"] = $b_current_cats->$b_cat_id - 1;
                }
            }

            Log::info("\n\n\n\n\n\n\n\n\nCATS_ARRAY");
            Log::info( "cats_array \n".print_r( $cats_array, true  ));


            Log::info("\n\n\n\n\n\n\n\n\nADD TO BUILDER");

            //ADD to builder cats
            foreach ($p_cats_new as $cat_key => $cat_id) {
                Log::info("$cat_key => $cat_id");

                // if( in_array( $cat_id, $new_cats_values ) ){
                // if( property_exists( $b_current_cats, $cat_id  ) ){
                if( in_array( $cat_id, $cats_array, true ) ){
                    // PRESENT, add 1
                    $cats_array["$cat_id"] = $cats_array["$cat_id"] + 1;
                }
                else{
                    $cats_array["$cat_id"] = 1;
                }
            }


            Log::info("\n\n\n\n\n\n\n\n\nCATS_ARRAY");
            Log::info( "cats_array \n".print_r( $cats_array, true  ));

            $b->categorys_json = json_encode( $cats_array );
            $b->save();
        }




















        $item->update($input);

        return redirect()->route('models.products.index')
            ->with('success', 'Product updated successfully');
    }















    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_product  $_product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = _product::find($id);

        // adjust category amounts
        if( true ){
            $new_cats = json_decode($item->categorys_json);

            $b_id = $item->builder_id;

            $b = _builder::find($b_id);

            $b_current_cats = json_decode($b->categorys_json);

            $cats_array = [];

            if( $b_current_cats !== null ){
                $new_cats_values = array_values($new_cats);

                //iterate over all builder cats
                foreach ($b_current_cats as $cat_id => $cat_value) {

                    //test if b_current_cats in new_product_cats
                    if( in_array( $cat_id, $new_cats_values ) ){
                        // Log::info("*** PRESENT");
                        $cats_array["$cat_id"] = $b_current_cats->$cat_id - 1;
                    }
                    else{
                        $cats_array["$cat_id"] = $b_current_cats->$cat_id;
                    }
                }
            }

            $b->categorys_json = json_encode( $cats_array );
            $b->save();
        }

        $item->delete();

        return redirect()->route('products.index')
                ->with('success','Product deleted successfully');
    }
}
