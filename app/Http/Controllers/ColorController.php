<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
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
            'color' => 'required',
        ]);
        $data = new Color();
        $data->color = $request->post('color');
        $data->status = 1;
        $data->save();
        $request->session()->flash('message','Color Inserted');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colors = Color::find($id);
        return view('admin.colors.edit', compact('colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'color' => 'required|unique:colors',
        ]);

        $data = [
            'color'=>$request->color,
        ];
        Color::where('id',$id)->update($data);
        $request->session()->flash('messages','Color updated');
        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $Colors = Color::where('id', $id)->delete();
        $request->session()->flash('message','Color Deleted');
        return redirect()->back();
    }
    public function status(Request $request,$status, $id)
    {
        $colors = Color::find($id);
        $colors->status=$status;
        $colors-> save();
        $request->session()->flash('update','Color Status Updated');
        return redirect()->back();
    }
}
