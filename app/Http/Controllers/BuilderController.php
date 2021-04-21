<?php

namespace App\Http\Controllers;

use App\Models\_image;
use App\Models\_builder;
use App\Models\_product;
use App\Models\_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BuilderController extends Controller
{
    // private $class_name = "builders";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $pages = 20;
        $_count = _builder::count();

        $items = _builder::orderBy('builder')->paginate(20);
        // $items = _builder::latest()->paginate(20);
        // $_builders = _builder::all();

        return view('models.builders.index')
            ->with('items', $items)
            ->with('_class', new _builder)
            // ->with('builders', new _builder)
            ->with('_count', $_count )
            ->with('page_count', floor($_count/$pages) )
            ->with('i', (request()->input('page', 1))  );

            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.builders.create')->with('_class', new _builder);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'company' => 'required',
        ]);
        */

        _builder::create($request->all());

        return redirect()->route('models.builders.index')
            ->with('success', 'Builder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\_builder  $_builder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $_item = _builder::find($id);

        return view('models.builders.show')->with('_item', $_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_builder  $_builder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $_item = _builder::find($id);

        $_builders = _builder::orderBy('builder')->get();
        $_categories = _category::orderBy('cat')->get();

        return view('models.builders.edit')
                    ->with('_item', $_item )
                    ->with('_class', new _builder)
                    ->with('categorys', $_categories )
                    ->with('builders', $_builders );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_builder  $_builder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info("BUILDER UPDATE REQUEST");
        Log::info( print_r( $request->all(), true  ));

        $input = $request->all();
        $input['categorys'] = $request->input('categorys');


        if ( $request->hasFile('logo')  ) {
            Log::info("BUILDER UPDATE REQUEST HAS IMAGE FILE");

            $validated = $request->validate([
                // 'image_name' => 'string|max:40',
                'builder' => 'string|max:40',
                'logo' => 'mimes:jpeg,png,gif|max:1024',
            ]);


            // $extension  = $request->image_file->extension();

            $image_path = $request->logo->store( 'public/logos/'.$input['builder_id'] );
            $url = Storage::url( $image_path );

            // $request->image_file->storeAs('/public//'.$input['builder_id'], $validated['name'].".".$extension );
            // $url = Storage::url( $input['builder_id'].'/'.$validated['name'].".". $extension );


            $file = _image::create([
                'name' => $validated['builder'],
                'url' => $url,
            ]);

            $input['logo'] = $url;
        }


        Log::info("BUILDER UPDATE INPUTS");
        Log::info( print_r( $input, true  ));





        $item = _builder::find($id);
        $item->update($input);
        // $item->update($request->all());

        return redirect()->route('models.builders.index')
            ->with('success', 'Builder updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_builder  $_builder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = _builder::find($id);
        $item->delete();

        return redirect()->route('models.builders.index')
                ->with('success','Builder deleted successfully');
    }
}
