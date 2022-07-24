<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where(['status'=>1])->get();
        return view('admin.products.create', compact('categories'));
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
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'slug' => 'required|unique:products',
        ]);
        $data = new Product();
        $data->name = $request->post('name');
        $data->category_id = $request->post('category_id');
        $data->image = $request->post('image');
        $data->slug = $request->post('slug');
        $data->brand = $request->post('brand');
        $data->model = $request->post('model');
        $data->short_desc = $request->post('short_desc');
        $data->desc = $request->post('desc');
        $data->keywords = $request->post('keywords');
        $data->technical_specification = $request->post('technical_specification');
        $data->uses = $request->post('uses');
        $data->warranty = $request->post('warranty');
        $data->status = 1;
        $image = $request->file('image');
            if ($request->HasFile('image')){
            $img_full_name = time().'.'.$image->getClientOriginalExtension();
            $img_path = 'media/product/';
            $img_name = $img_path.$img_full_name;
            $image->move($img_path,$img_full_name);
            $data['image'] = $img_name;
            }
        $data->save();
        $request->session()->flash('message','Product Inserted');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where(['status'=>1])->get();
        $products = Product::find($id);
       return view('admin.products.edit', compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
        ]);

        $data = [
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'slug'=>$request->slug,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'short_desc'=>$request->short_desc,
            'desc'=>$request->desc,
            'keywords'=>$request->keywords,
            'technical_specification'=>$request->technical_specification,
            'uses'=>$request->uses,
            'warranty'=>$request->warranty,
            'status' => 1,
        ];
        Product::where('id',$id)->update($data);
        $request->session()->flash('messages','Product updated');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::where('id', $id)->delete();
        $request->session()->flash('message','Product Deleted');
        return redirect()->back();
    }
    public function status(Request $request,$status, $id)
    {
        $product = Product::find($id);
        $product->status=$status;
        $product-> save();
        $request->session()->flash('update','Product Status Updated');
        return redirect()->back();
    }
}
