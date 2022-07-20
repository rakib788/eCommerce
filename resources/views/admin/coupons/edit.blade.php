@extends('admin.Layouts.app')
@section('page_title','Update Coupon')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Manage Coupon</h2>
                        <a href="{{ route('coupon.index') }}">
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
                    <form action="{{ route('coupon.update',$coupons->id) }}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Title</label>
                            <input id="title" name="title" type="text" value="{{ $coupons->title }}" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group has-success">
                            <label for="code" class="control-label mb-1">Code</label>
                            <input id="code" name="code" type="text" value="{{ $coupons->code }}" class="form-control cc-name valid" required>
                            @error('code')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group has-success">
                            <label for="value" class="control-label mb-1">Value</label>
                            <input id="value" name="value" type="number" value="{{ $coupons->value }}" class="form-control cc-name valid" required>
                            @error('value  ')
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
