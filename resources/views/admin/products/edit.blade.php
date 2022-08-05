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

            <div class="row m-t-30">
                <div class="col-md-12 form-1">
                    @if(session()->has('message'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('product.update',$products->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Name</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{ $products->name }}" aria-required="true" aria-invalid="false" required>
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="control-label mb-1">Category Name</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="">Select Categories</option>
                                @foreach ($categories as $row)
                                @if ($products->category_id == $row->id)
                                <option selected value="{{ $row->id }}">
                                    @else
                                    <option value="{{ $row->id }}">
                                @endif
                                    {{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-success">
                            <label for="slug" class="control-label mb-1">Slug</label>
                            <input id="slug" name="slug" type="text" class="form-control cc-name valid" value="{{ $products->slug }}" required>
                            @error('slug ')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label mb-1">Image</label>
                            <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                            @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand" class="control-label mb-1">Brand</label>
                            <input id="brand" name="brand" type="text" class="form-control" value="{{ $products->brand }}" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="form-group">
                            <label for="model" class="control-label mb-1">Model</label>
                            <input id="model" name="model" type="text" class="form-control" value="{{ $products->model }}" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="form-group">
                            <label for="short_desc" class="control-label mb-1">Short_desc</label>
                            <textarea class="form-control" name="short_desc" id="short_desc" rows="2">{{ $products->short_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="control-label mb-1">Description</label>
                            <textarea class="form-control" name="desc" id="desc" rows="2">{{ $products->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="control-label mb-1">Keywords</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="2">{{ $products->keywords }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="technical_specification" class="control-label mb-1">Technical_specification</label>
                            <textarea class="form-control" name="technical_specification" id="technical_specification" rows="2">{{ $products->technical_specification }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="uses" class="control-label mb-1">Uses</label>
                            <textarea class="form-control" name="uses" id="uses" rows="2">{{ $products->uses }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="warranty" class="control-label mb-1">Warranty</label>
                            <textarea class="form-control" name="warranty" id="warranty" rows="2">{{ $products->warranty }}</textarea>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="au-btn au-btn-icon btn-info">
                                Add Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
