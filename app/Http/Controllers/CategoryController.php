<?php

namespace App\Http\Controllers;

use App\Models\_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $class_name = "categorys";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 20;
        $_count = _category::count();

        $items = _category::paginate(20);

        $categorys = _category::all();

        return view("models.{$this->class_name}.index", compact('items') )
            ->with('_class', new _category)
            // ->with('categorys', $categorys)
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
        $_categories = _category::select('id', 'cat', 'cat_id')->distinct()->orderBy('cat')->get();

        return view("models.{$this->class_name}.create")
                ->with('_class', new _category)
                ->with('categorys', $_categories );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        _category::create($request->all());

        return redirect()->route("models.{$this->class_name}.index")
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\_category  $_category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $_item = _category::find($id);

        return view("models.{$this->class_name}.show")->with('_item', $_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_category  $_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $_item = _category::find($id);

        $_categories = _category::distinct()->orderBy('cat')->get();

        return view("models.{$this->class_name}.edit")
                    ->with('_item', $_item )
                    ->with('categorys', $_categories );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_category  $_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = _category::find($id);
        $item->update($request->all());

        return redirect()->route("models.{$this->class_name}.index")
            ->with('success', 'Category updated successfully');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_category  $_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = _category::find($id);
        $item->delete();

        return redirect()->route("models.{$this->class_name}.index")
                ->with('success','Category deleted successfully');
    }
}
