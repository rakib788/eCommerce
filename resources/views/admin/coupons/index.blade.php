@extends('admin.Layouts.app')
@section('page_title','Coupon')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Coupon</h2>
                        <a href="{{ route('coupon.create') }}">
                        <button class="au-btn au-btn-icon btn-success">
                            <i class="zmdi zmdi-plus"></i>Add
                        </button>
                    </a>
                    </div>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    @if(session()->has('message'))
                        <div class="alert alert-danger text-center">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->has('messages'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('messages') }}
                        </div>
                    @endif
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Value</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->title }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->value }}</td>
                                        <td class="display">
                                            <div>
                                                <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            </div>
                                            <div class="btn-ml">
                                                <form action="{{ route('coupon.destroy', $coupon->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-sm btn-danger"> delete</button>
                                                </form>
                                            </div>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

        </div>
    </div>
</div>
@endsection
<style>
    .display{
        display: flex;
        justify-content: center;
    }
    .btn-ml{
        margin-left: 6px;
    }
</style>
