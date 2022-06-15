<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categories::orderBy('id','DESC')->get();
        return view('admincp.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admincp.categories.create');
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
        $data = $request->validate([
            'namecategory' => 'required|max:255|unique:categories',
            'describecategory' => 'required|max:255',
            'slug_category' => 'required|max:255|unique:categories',
            'active' => 'required'
        ],[
            'slug_category.unique' => 'Slug Category already exits ,please enter another Slug Category !' 
        ]);
        $categories = new Categories();
        $categories->namecategory = $data['namecategory'];
        $categories->describecategory = $data['describecategory'];
        $categories->slug_category = $data['slug_category'];
        $categories->active = $data['active'];
        $categories->save();
        return redirect()->back()->with('status','Add Category Complete!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Categories::find($id);
        return view('admincp.categories.edit')->with(compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate([
            'namecategory' => 'required|max:255|unique:categories',
            'describecategory' => 'required|max:255',
            'slug_category' => 'required|max:255|unique:categories',
            'active' => 'required'
        ],
        [
          'namecategory.unique' => 'Category already exits ,please enter another Category !' ,
          'slug_category.unique' => 'Slug Category already exits ,please enter another Slug Category !' 
        ]);
        $categories = Categories::find($id);
        $categories->namecategory = $data['namecategory'];
        $categories->describecategory = $data['describecategory'];
        $categories->slug_category = $data['slug_category'];
        $categories->active = $data['active'];
        $categories->save();
        return redirect()->back()->with('status','Update Category Complete!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categories::find($id)->delete();
        return redirect()->back()->with('status','Delete Category Complete!');
    }
    public function search(){

    }
}
