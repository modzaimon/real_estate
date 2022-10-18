@php
    $page_name ='seller';
@endphp

@extends('lte3.layouts.app')

@section('title',ucfirst($page_name))

@section('css')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" /> --}}

@endsection

@section('content')
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Creat {{ucfirst($page_name)}}</h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('seller.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="name">{{ucfirst($page_name)}} Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required value="{{old('name')}}">
                      @error('name')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="tel">Tel</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter tel" required value="{{old('tel')}}" maxlength="10">
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
                          <option value="{{ $val->id }}" {{old('type')==$val->id?'selected':''}}>{{ $val->name}}</option>
                        @endforeach
                      </select>
                      @error('type')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    
                    <div class="form-group">
                      <label for="des">Description</label>
                      <textarea class="form-control" id="des" name="des" cols="30" rows="5" placeholder="Enter Description">{{old('des')}}</textarea>
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