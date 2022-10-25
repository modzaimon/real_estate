@php
    $page_name = explode('/',url()->current())[3];
@endphp
@extends('lte3.layouts.app')
@section('title',ucfirst($page_name))
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection

@section('content')

@php
  $seller = $data['seller'];
@endphp

<div class="col-md-6">
    {{-- <pre>{{ print_r($data)}}</pre>     --}}

</div>
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit</h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('seller.update',$seller->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="name">Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required value="{{old('name')?old('name'):$seller->name}}">
                      @error('name')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="tel"> tel</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter tel" required value="{{old('tel')?old('tel'):$seller->tel}}" maxlength="10">
                      @error('tel')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Type</label><span class="text-danger"> *</span>
                      <select class="form-control" name="type" required>
                        <option value="">-</option>
                        @foreach ($data['seller_type'] as $val)
                          <option value="{{ $val->id }}" {{old('type')?(old('type')==$val->id?'selected':''):$seller->type_id==$val->id?'selected':''}}>{{ $val->name}}</option>
                        @endforeach
                      </select>
                      @error('type')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Brand</label>
                      <select class="form-control" name="brand" >
                        <option value="">-</option>
                        @if (isset($data['brand']))
                          @foreach ($data['brand'] as $val)
                          <option value="{{ $val->id }}" {{old('brand')?(old('brand')==$val->id?'selected':''):$seller->brand_id==$val->id?'selected':''}}>{{ $val->name}}</option>
                          @endforeach
                        @endif
                      </select>
                      @error('brand')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="des">Description</label>
                      <textarea class="form-control" id="des" name="des" cols="30" rows="5" placeholder="Enter Description">{{old('des')?old('des'):$seller->des}}</textarea>
                    </div>

                    
                    <button type="submit" class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
            <!-- /.card-body -->
            
            {{-- <div class="card-footer"></div> --}}
        </div>
    </div>
@endsection

@section('js')

<script type="text/javascript">

    
$(document).ready(function () {




});

</script>




@endsection