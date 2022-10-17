@php
    $page_name ='developer';
@endphp
@extends('lte3.layouts.app')
@section('title',ucfirst($page_name))
@section('content')
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Creat {{ucfirst($page_name)}}</h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('developer.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="name">{{ ucfirst($page_name)}} Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name')}}" required>
                      @error('name')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Brand</label><span class="text-danger"> *</span>
                      <select class="form-control" name="brand_id" required>
                        <option value="">-</option>
                          @foreach ($data as $val)
                          <option value="{{ $val->id }}" {{ (old('brand_id')==$val->id)?'selected ':''}}>{{ $val->name }}</option>
                          @endforeach
                      </select>
                      @error('brand_id')
                            <span class="invalid-feedback " role="alert" style="display:block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                      <label for="des">Description</label>
                      <textarea class="form-control" id="des" name="des" cols="30" rows="10" placeholder="Enter Description">{{old('des')}}</textarea>
                    </div>
                   
                    <button type="submit" class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
            <!-- /.card-body -->
            
            {{-- <div class="card-footer"></div> --}}
        </div>
    </div>

@endsection
