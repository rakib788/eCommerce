<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_Attribute;
use App\Models\Size;
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
        $sizes = Size::where(['status'=>1])->get();
        $colors = Color::where(['status'=>1])->get();
        return view('admin.products.create', compact('categories','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>';
        // print_r($request->post());
        // die();
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
        $pid = $data->id;
        // product_attr Start

            $skuArr = $request->post('sku');
            $mrpArr = $request->post('mrp');
            $priceArr = $request->post('price');
            $quantityArr = $request->post('quantity');
            $size_idArr = $request->post('size_id');
            $color_idArr = $request->post('color_id');
            foreach ($skuArr as $key => $value) {
                $product_attr_arr['product_id']=$pid;
                $product_attr_arr['sku']=$skuArr[$key];
                $product_attr_arr['attr_image']='test';
                $product_attr_arr['mrp']=$mrpArr[$key];
                $product_attr_arr['price']=$priceArr[$key];
                $product_attr_arr['quantity']=$quantityArr[$key];
                if ($size_idArr[$key]=='') {
                    $product_attr_arr['size_id']=0;
                }else{
                    $product_attr_arr['size_id']=$size_idArr[$key];
                }
                if ($color_idArr[$key]=='') {
                    $product_attr_arr['color_id']=0;
                }else{
                    $product_attr_arr['color_id']=$color_idArr[$key];
                }

                 Product_Attribute::insert($product_attr_arr);

            }
        // product_attr end


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
        $product_attrs = Product_Attribute::where(['product_id'=>$id])->get();
        $sizes = Size::where(['status'=>1])->get();
        $colors = Color::where(['status'=>1])->get();
        $categories = Category::where(['status'=>1])->get();
        $products = Product::find($id);
       return view('admin.products.edit', compact('products','categories','sizes','colors','product_attrs'));
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
            'image'=>$request->image,
        ];
        if ($request->HasFile('image')){
            $image = $request->file('image');
            $img_full_name = time().'.'.$image->getClientOriginalExtension();
            $img_path = 'media/product/';
            $img_name = $img_path.$img_full_name;
            $image->move($img_path,$img_full_name);
            $data['image']=$img_name;
            }
       $product = Product::where('id',$id)->update($data);
        // $pid =$product->id;
        // product_attr Start

            $skuArr = $request->post('sku');
            $mrpArr = $request->post('mrp');
            $priceArr = $request->post('price');
            $quantityArr = $request->post('quantity');
            $size_idArr = $request->post('size_id');
            $color_idArr = $request->post('color_id');
            foreach ($skuArr as $key => $value) {
                $product_attr_arr['product_id']= 1;
                $product_attr_arr['sku']=$skuArr[$key];
                $product_attr_arr['attr_image']='test';
                $product_attr_arr['mrp']=$mrpArr[$key];
                $product_attr_arr['price']=$priceArr[$key];
                $product_attr_arr['quantity']=$quantityArr[$key];
                if ($size_idArr[$key]=='') {
                    $product_attr_arr['size_id']=0;
                }else{
                    $product_attr_arr['size_id']=$size_idArr[$key];
                }
                if ($color_idArr[$key]=='') {
                    $product_attr_arr['color_id']=0;
                }else{
                    $product_attr_arr['color_id']=$color_idArr[$key];
                }
                Product_Attribute::create($product_attr_arr);

                //  Product_Attribute::insert($product_attr_arr);

            }
        // product_attr end

        $request->session()->flash('messages','Product updated');
        return redirect()->back();
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
    public function attr_delete(Request $request,$id)
    {
        DB::table('product__attributes')->where(['id'=> $id])->delete();
        // Product_Attribute::find($id)->delete();
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
