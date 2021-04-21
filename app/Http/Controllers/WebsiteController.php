<?php

namespace App\Http\Controllers;

use App\Models\_website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 20;
        $_count = _website::count();

        $items = _website::latest()->paginate(20);
        // $_websites = _website::all();

        return view('models.websites.index', compact('items') )
            ->with('_class', new _website)
            // ->with('builders', new _website)
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
        return view('models.websites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *
         * id               int
         *
         * url              string
         * wneo_id          string
         * wneo_products    string
         * site_created     string
         *notes
         *
         */

        $request->validate([
            'url' => 'required',
        ]);

        $website = new _website([
            'url' => $request->get('url'),
        ]);

        $website->save();

        return redirect('/websites')->with('success', 'Website saved!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\_website  $_website
     * @return \Illuminate\Http\Response
     */
    public function show(_website $_website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_website  $_website
     * @return \Illuminate\Http\Response
     */
    public function edit(_website $_website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_website  $_website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, _website $_website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_website  $_website
     * @return \Illuminate\Http\Response
     */
    public function destroy(_website $_website)
    {
        //
    }
}
