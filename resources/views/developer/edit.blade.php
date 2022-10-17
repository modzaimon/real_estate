@php
    $page_name ='developer';
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
                <form action="{{ route('developer.update',$data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="name">{{ucfirst($page_name)}} Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required value="{{ old('name')?old('name'):$data->name }}">
                    </div>
                    @error('name')
                      <span class="invalid-feedback " role="alert" style="display:block">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror

                    <div class="form-group">
                      <label>Brand</label><span class="text-danger"> *</span>
                      <select class="form-control" name="brand_id" required>
                        <option value="">-</option>
                        @foreach ($brand as $brand)
                          <option value="{{ $brand->id }}" {{ old()?(old('brand_id')==$brand->id?'selected':''):($data->brand->id==$brand->id)?'selected':''}} >{{ $brand->name }}</option>
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
                      <textarea class="form-control" id="des" name="des" cols="30" rows="10" placeholder="Enter Description">{{ old('des')?old('des'):$data->des }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
            <!-- /.card-body -->
            
            {{-- <div class="card-footer"></div> --}}
        </div>
    </div>

@endsection
