<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sizes.create');
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
            'size' => 'required|unique:sizes',
        ]);
        $data = new Size();
        $data->size = $request->post('size');
        $data->status = 1;
        $data->save();
        $request->session()->flash('message','Size Inserted');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sizes = Size::find($id);
        return view('admin.sizes.edit', compact('sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|unique:sizes',
        ]);

        $data = [
            'size'=>$request->size,
        ];
        Size::where('id',$id)->update($data);
        $request->session()->flash('messages','Size updated');
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $sizes = Size::where('id', $id)->delete();
        $request->session()->flash('message','Size Deleted');
        return redirect()->back();
    }
    public function status(Request $request,$status, $id)
    {
        $sizes = Size::find($id);
        $sizes->status=$status;
        $sizes-> save();
        $request->session()->flash('update','Size Status Updated');
        return redirect()->back();
    }
}
