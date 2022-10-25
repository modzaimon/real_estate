@php
    $page_name = explode('/',url()->current())[3];
@endphp
@extends('lte3.layouts.app')
@section('title',ucfirst($page_name))
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">View</small> </h3>
            <span class="float-right"><a href="{{ route('brand.edit', $data->id) }}" class="btn btn-sm btn-warning">
                <i class="fa-sharp fa-solid fa-pen"></i> Edit
            </a></span>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">

            <dl class="row">
                <dt class="col-sm-4 text-right">Brand Name : </dt>
                <dd class="col-sm-8">
                    <span class="">{{ $data->name }}</span> 
                    <span></span>
                </dd>
                {{-- <dt class="col-sm-4 text-right">Status : </dt>
                <dd class="col-sm-8">
                    @if ($data->is_active == 1)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">Not Active</span>
                    @endif
                </dd> --}}
                <dt class="col-sm-4 text-right">Description : </dt>
                <dd class="col-sm-8">{{ $data->des }}</dd>

                
            </dl>

        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix ">
            <div class="float-right">
                
            </div>
        </div>
    </div>


@endsection
