<?php

namespace App\Http\Controllers;

use App\Models\_client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $clients = _client::all();

        // return response()->json($clients);
        // return \View::make('models.clients.index')->with('models.clients', $clients);

        $items = _client::latest()->paginate(5);

        return view('models.clients.index', compact('items') )
            ->with('_class', new _client)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.clients.create')->with('_class', new _client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
        ]);

        _client::create($request->all());

        return redirect()->route('models.clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\_client  $_client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $_item = _client::find($id);

        return view('models.clients.show')->with('_item', $_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_client  $_client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $_item = _client::find($id);

        return view('models.clients.edit')
                    ->with('_item', $_item );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_client  $_client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
        $request->validate([
            'company' => 'required',
        ]);
        */

        $item = _client::find($id);
        $item->update($request->all());

        return redirect()->route('models.clients.index')
            ->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_client  $_client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $item = _client::find($id);
        $item->delete();

        return redirect()->route('models.clients.index')
                ->with('success','Client deleted successfully');
    }
}
