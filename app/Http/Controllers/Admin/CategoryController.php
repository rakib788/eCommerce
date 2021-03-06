<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
        ]);
        $data = new Category();
        $data->category_name = $request->post('category_name');
        $data->category_slug = $request->post('category_slug');
        $data->status = 1;
        $data->save();
        $request->session()->flash('message','Category Inserted');
        return redirect()->back();
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
        $categories = Category::find($id);
       return view('admin.categories.edit', compact('categories'));
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
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories',
        ]);

        $data = [
            'category_name'=>$request->category_name,
            'category_slug'=>$request->category_slug,
        ];
        Category::where('id',$id)->update($data);
        $request->session()->flash('messages','Category updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = Category::where('id', $id)->delete();
        $request->session()->flash('message','Category Deleted');
        return redirect()->back();
    }
    public function status(Request $request,$status, $id)
    {
        $category = Category::find($id);
        $category->status=$status;
        $category-> save();
        $request->session()->flash('update','Category Status Updated');
        return redirect()->back();
    }
}
