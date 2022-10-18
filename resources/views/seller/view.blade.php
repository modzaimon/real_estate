@php
    $page_name ='Seller';
@endphp
@extends('lte3.layouts.app')
@section('title',ucfirst($page_name))
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">View</small> </h3>
            <span class="float-right"><a href="{{ route('seller.edit', $data->id) }}" class="btn btn-sm btn-warning">
                <i class="fa-sharp fa-solid fa-pen"></i> Edit
            </a></span>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">

            <dl class="row">
                <dt class="col-sm-4 text-right">{{ucfirst($page_name)}} Name : </dt>
                <dd class="col-sm-8">
                    <span class="">{{ $data->name }}</span> 
                    <span></span>
                </dd>

                <dt class="col-sm-4 text-right"> tel : </dt>
                <dd class="col-sm-8">
                    <span class="">{{ $data->tel }}</span> 
                    <span></span>
                </dd>

                <dt class="col-sm-4 text-right"> Type: </dt>
                <dd class="col-sm-8">
                    <span class="">{{ isset($data->seller_type->name)?$data->seller_type->name:'' }}</span> 
                    <span></span>
                </dd>

                
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