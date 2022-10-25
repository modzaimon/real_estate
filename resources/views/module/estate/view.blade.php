@php
    $page_name = explode('/',url()->current())[3];
@endphp
@extends('lte3.layouts.app')
@section('title',ucfirst($page_name))
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">View</small> </h3>
            <span class="float-right"><a href="{{ route('estate.edit', $data->id) }}" class="btn btn-sm btn-warning">
                <i class="fa-sharp fa-solid fa-pen"></i> Edit
            </a></span>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">

            <dl class="row">
                <dt class="col-sm-4 text-right"> Number : </dt>
                <dd class="col-sm-8">  <span class="">{{ $data->number }}</span> </dd>

                <dt class="col-sm-4 text-right">Deed No : </dt>
                <dd class="col-sm-8"><span>{{ $data->deed_no}} </span></dd>

                <dt class="col-sm-4 text-right"> Project: </dt>
                <dd class="col-sm-8">
                    <span class="">{{ isset($data->Project->name)?$data->Project->name:'' }}</span> 
                </dd>

                <dt class="col-sm-4 text-right"> Type : </dt>
                <dd class="col-sm-8">
                    <span class="">{{ isset($data->estate_type->name)?$data->estate_type->name:'' }}</span> 
                </dd>
                
                <dt class="col-sm-4 text-right">Size : </dt>
                <dd class="col-sm-8">{{ $data->size}} {{isset($data->unit->name)?$data->unit->name:'' }}</dd>
                
                <dt class="col-sm-4 text-right"> Build Year : </dt>
                <dd class="col-sm-8"> <span class="">{{ $data->build_year }}</span>  </dd>
                
                <dt class="col-sm-4 text-right">Description : </dt>
                <dd class="col-sm-8"><span>{{ $data->des }}</span></dd>

                
            </dl>

        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix ">
            <div class="float-right">
                
            </div>
        </div>
    </div>


@endsection