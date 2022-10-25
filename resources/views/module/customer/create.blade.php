@php
    $page_name = explode('/',url()->current())[3];
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
                <h3 class="card-title">Creat</h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="firstname">First Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required value="{{old('firstname')}}">
                      @error('firstname')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="lastname">Last Name</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name"  value="{{old('lastname')}}">
                      @error('lastname')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="birthdate">Birthdate</label><span class="text-danger">( ปี พ.ศ.)</span>
                      <input type="text" id="birthdate" name="birthdate" value="{{old('birthdate')}}" class="form-control" placeholder="dd-mm-yyyy" data-inputmask="'alias': 'datetime', 'inputFormat': 'dd-mm-yyyy'" />
                      @error('birthdate')
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
<script src="https://unpkg.com/inputmask@4.0.4/dist/inputmask/dependencyLibs/inputmask.dependencyLib.js"></script>
<script src="https://unpkg.com/inputmask@4.0.4/dist/inputmask/inputmask.js"></script>
<script src="https://unpkg.com/inputmask@4.0.4/dist/inputmask/inputmask.date.extensions.js"></script>
<script type="text/javascript">
  
  $(document).ready(function () {
    Inputmask().mask("birthdate");

  });

</script>




@endsection