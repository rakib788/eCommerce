@extends('admin.Layouts.app')
@section('page_title','Color')
@section('color_select','active')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Color</h2>
                        <a href="{{ route('color.create') }}">
                        <button class="au-btn au-btn-icon btn-success">
                            <i class="zmdi zmdi-plus"></i>Add
                        </button>
                    </a>
                    </div>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    @if(session()->has('update'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        {{ session()->get('update') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
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
                                    <th>Color</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $color)
                                <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->color }}</td>
                                        <td class="display">
                                            <div>
                                                <a href="{{ route('color.edit', $color->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            </div>
                                            <div class="btn-ml">
                                                @if ($color->status==1)
                                                <a href="{{ url('admin/color/status/0') }}/{{ $color->id }}" class="btn btn-sm btn-primary">Active</a>
                                                @elseif ($color->status==0)
                                                <a href="{{ url('admin/color/status/1') }}/{{ $color->id }}" class="btn btn-sm btn-warning">Deactive</a>
                                                @endif
                                            </div>
                                            <div class="btn-ml">
                                                <form action="{{ route('color.destroy', $color->id) }}" method="POST">
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
