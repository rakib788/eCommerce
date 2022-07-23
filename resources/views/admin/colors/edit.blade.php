@extends('admin.Layouts.app')
@section('page_title','Update Color')
@section('color_select','active')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Manage Color</h2>
                        <a href="{{ route('color.index') }}">
                        <button class="au-btn au-btn-icon btn-dark">
                            <i class=""></i>Back
                        </button>
                    </a>
                    </div>
                </div>
            </div>

            <div class="row m-t-30">
                <div class="col-md-12">
                    @if(session()->has('message'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('color.update',$colors->id) }}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="color" class="control-label mb-1">Color</label>
                            <input id="color" name="color" type="text" value="{{ $colors->color }}" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('color')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="au-btn au-btn-icon btn-info">
                                 Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
