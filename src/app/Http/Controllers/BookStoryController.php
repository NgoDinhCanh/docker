<?php

namespace App\Http\Controllers;

use App\Models\BookStory;
use App\Models\Categories;
use Illuminate\Http\Request;

class BookStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookstories = BookStory::orderBy('id','DESC')->get();
        return view('admincp.bookstory.index')->with(compact('bookstories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categories::orderBy('id','DESC')->get();
        return view('admincp.bookstory.create')->with(compact('categories'));
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
            'namebookstory' => 'required|max:255|unique:bookstory',
            'descriptionbookstory' => 'required',
            'slug_bookstory' => 'required|max:255|unique:bookstory',
            'imagebookstory' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height_100,max_width=1200,max_height=1200',
            'active' => 'required',
            'listbookstory' => 'required'
        ],[
            'slug_bookstory.unique' => 'Slug bookstory already exits ,please enter another Slug bookstory !' 
        ]);
        $bookstories = new BookStory();
        $bookstories->namebookstory = $data['namebookstory'];
        $bookstories->descriptionbookstory = $data['descriptionbookstory'];
        $bookstories->slug_bookstory = $data['slug_bookstory'];
        $bookstories->categories_id = $data['listbookstory'];
        $path = public_path('/uploads/imagebookstory/');
        $getImage = $request->imagebookstory;
        $getNameImage = $getImage->getClientOriginalName();
        $nameImage = current(explode('.',$getNameImage));
        $newNameImage = $nameImage.rand(0,99).'.'.$getImage->getClientOriginalExtension();
        $getImage->move($path,$newNameImage);
        $bookstories->imagebookstory = $newNameImage;
        $bookstories->active = $data['active'];
        $bookstories->save();
        return redirect()->back()->with('status','Add book story Complete!!!');
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
    }
}
