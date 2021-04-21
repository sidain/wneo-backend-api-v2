<?php

namespace App\Http\Controllers;

use App\Models\_site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 20;
        $_count = _site::count();

        $items = _site::latest()->paginate(20);
        // $_sites = _site::all();

        return view('models.sites.index', compact('items') )
            ->with('_class', new _site)
            // ->with('builders', new _site)
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
     * @param  \App\Models\_site  $_site
     * @return \Illuminate\Http\Response
     */
    public function show(_site $_site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_site  $_site
     * @return \Illuminate\Http\Response
     */
    public function edit(_site $_site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_site  $_site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, _site $_site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_site  $_site
     * @return \Illuminate\Http\Response
     */
    public function destroy(_site $_site)
    {
        //
    }
}
