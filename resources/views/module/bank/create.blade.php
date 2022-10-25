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
                <form action="{{ route('bank.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter First Name" required value="{{old('name')}}">
                      @error('name')
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