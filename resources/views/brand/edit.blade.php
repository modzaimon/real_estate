@php
    $page_name ='brand';
@endphp
@extends('lte3.layouts.app')
@section('title',ucfirst($page_name))
@section('content')
    <div class="col-md-6">
        
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit </h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('brand.update',$data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="name">{{ ucfirst($page_name) }} Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required value="{{ old('name')?old('name'):$data->name }}">
                        @error('name')
                          <span class="invalid-feedback " role="alert" style="display:block">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="des">Description</label>
                      <textarea class="form-control" id="des" name="des" id="" cols="30" rows="10" placeholder="Enter Description">{{ old('des')?old('des'):$data->des }}</textarea>
                    </div>

                    {{-- <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{old()?(old('is_active')=='on'?'checked = checked':''):$data->is_active == 1 ? 'checked = checked':''}} >
                        <label class="custom-control-label" for="is_active">Active</label>
                      </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
            <!-- /.card-body -->
            
            {{-- <div class="card-footer"></div> --}}
        </div>
    </div>

@endsection
