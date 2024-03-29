@extends('admin.Layouts.app')
@section('page_title','Manage Product')
@section('product_select','active')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Manage Product</h2>
                        <a href="{{ route('product.index') }}">
                        <button class="au-btn au-btn-icon btn-success">
                            <i class=""></i>Back
                        </button>
                    </a>
                    </div>
                </div>
            </div>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row m-t-30">
                    <div class="col-md-12 form-1">
                        @if(session()->has('message'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                            <div class="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-success">
                                            <label for="slug" class="control-label mb-1">Slug</label>
                                            <input id="slug" name="slug" type="text" class="form-control cc-name valid" required>
                                            @error('slug ')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id" class="control-label mb-1">Category Name</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option value="">Select Categories</option>
                                                @foreach ($categories as $row)
                                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image" class="control-label mb-1">Image</label>
                                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="brand" class="control-label mb-1">Brand</label>
                                        <input id="brand" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="model" class="control-label mb-1">Model</label>
                                        <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="short_desc" class="control-label mb-1">Short_desc</label>
                                        <textarea class="form-control" name="short_desc" id="short_desc" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="desc" class="control-label mb-1">Description</label>
                                        <textarea class="form-control" name="desc" id="desc" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keywords" class="control-label mb-1">Keywords</label>
                                        <textarea class="form-control" name="keywords" id="keywords" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="technical_specification" class="control-label mb-1">Technical_specification</label>
                                        <textarea class="form-control" name="technical_specification" id="technical_specification" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="uses" class="control-label mb-1">Uses</label>
                                        <textarea class="form-control" name="uses" id="uses" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="warranty" class="control-label mb-1">Warranty</label>
                                        <textarea class="form-control" name="warranty" id="warranty" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div>
                        </div>
                    </div>
                </div>
                <h2 class="mt-4">Product Attributes</h2>
                <div class="form-group" id="product_attr_box">
                    <div class="row m-t-30" id="product_attr_1">
                        <div class="col-md-12 form-1" id="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="sku" class="control-label mb-1">SKU</label>
                                            <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('sku')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="mrp" class="control-label mb-1">MRP</label>
                                            <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('mrp')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group has-success">
                                            <label for="price" class="control-label mb-1">Price</label>
                                            <input id="price" name="price[]" type="text" class="form-control cc-name valid" required>
                                            @error('price ')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="size_id" class="control-label mb-1">Size</label>
                                            <select name="size_id[]" class="form-control" id="size_id">
                                                <option value="">Select</option>
                                                @foreach ($sizes as $row)
                                                <option value="{{ $row->id }}">{{ $row->size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="color_id" class="control-label mb-1">Color</label>
                                            <select name="color_id[]" class="form-control" id="color_id">
                                                <option value="">Select</option>
                                                @foreach ($colors as $row)
                                                <option value="{{ $row->id }}">{{ $row->color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="quantity" class="control-label mb-1">Qunatity</label>
                                            <input id="quantity" name="quantity[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <input id="image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="au-btn-1 au-btn-icon btn-success" onclick="add_more()"><i class="fa fa-plus"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="au-btn-1 au-btn-icon btn-primary btn-block">Submit</button>
            </form>

        </div>
    </div>
</div>
{{-- <script>
    function add_more(){
        var html='<div class="row m-t-30"><div class="col-md-12 form-1" id=""><div class="form-gorup">';

            html='</div></div></div>';

        jQuery('#product_attr_box').append(html)
    }
</script> --}}
<script>
        var loop_count=1;
    function add_more() {
        loop_count++;
    //   var txt1 = "<p>Text.</p>";        // Create text with HTML
        var html= '<div class="row m-t-30" id="product_attr_'+loop_count+'"><div class="col-md-12 form-1" id=""><div class="row">';

            html+='<div class="col-md-2"><div class="form-group"><label for="sku" class="control-label mb-1">SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

            html+='<div class="col-md-2"><div class="form-group"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

            html+='<div class="col-md-2"><div class="form-group"><label for="price" class="control-label mb-1">Price</label><input id="price" name="price[]" type="number" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

            var size_id_html=jQuery('#size_id').html();
            html+='<div class="col-md-3"><div class="form-group"><label for="size_id" class="control-label mb-1">Size</label><select name="size_id[]" class="form-control" id="size_id">'+size_id_html+'</select></div></div>';

            var color_id_html=jQuery('#color_id').html();
            html+='<div class="col-md-3"><div class="form-group"><label for="color_id" class="control-label mb-1">Color</label><select name="color_id[]" class="form-control" id="color_id">'+color_id_html+'</select></div></div>';

            html+='<div class="col-md-2"><div class="form-group"><label for="quantity" class="control-label mb-1">Qunatity</label><input id="quantity" name="quantity[]" type="number" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

            html+='<div class="col-md-4"><div class="form-group"><label for="image" class="control-label mb-1">Image</label><input id="image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required></div></div>';

            html+='<div class="col-md-4"><div class="form-group"><button class="au-btn-1 au-btn-icon btn-danger" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i> Remove</button></div></div>';



            html+= '</div></div></div>';
      $("#product_attr_box").append(html);   // Append new elements
    }
    // function remove_more(loop_count){
    //     jQuery('#product_attr_'+loop_count).remove();
    // }
    function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
    }
</script>
@endsection
