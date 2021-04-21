<?php

namespace App\Http\Controllers;

use App\Models\_image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = _image::latest()
            ->paginate(20);

        $_count = _image::count();





        return view('models.images.index')
            ->with('items', $items)
            ->with('page_count', floor($_count/20) )
            ->with('_count', $_count )
            ->with('_class', new _image)
            // ->with('categorys', $_categories )
            // ->with('builders', $_builders )
            // ->with('filter_builder', $filter_builder )
            // ->with('filter_category', $filter_category )
            ->with('i', (request()->input('page', 1))  );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $items = _image::latest()
            ->paginate(5);





        return view('models.images.index2')
            ->with('items', $items)
            ->with('_class', new _image)
            // ->with('categorys', $_categories )
            // ->with('builders', $_builders )
            // ->with('filter_builder', $filter_builder )
            // ->with('filter_category', $filter_category )
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\_image  $_image
     * @return \Illuminate\Http\Response
     */
    public function show(_image $_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_image  $_image
     * @return \Illuminate\Http\Response
     */
    public function edit(_image $_image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_image  $_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, _image $_image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_image  $_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(_image $_image)
    {
        //
    }
}
