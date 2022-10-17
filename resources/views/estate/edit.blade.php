@php
    $page_name ='estate';
    $est = $data['estate'];
@endphp

@extends('lte3.layouts.app')

@section('title',ucfirst($page_name))

@section('content')
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit {{ucfirst($page_name)}}</h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('estate.update',$est->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="number">{{ucfirst($page_name)}} Number</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="number" name="number" placeholder="Enter number" required value="{{old('number')?old('number'):$est->number}}">
                      @error('number')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="deed_no"> Deed no</label>
                      <input type="text" class="form-control" id="deed_no" name="deed_no" placeholder="Enter deed_no"  value="{{old('deed_no')?old('deed_no'):$est->deed_no}}">
                      @error('deed_no')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Project</label>
                      <select class="form-control" name="project_id" >
                        <option value="">-</option>
                        @if (isset($data['project']))
                          @foreach ($data['project'] as $val)
                          <option value="{{ $val->id }}" {{old('project_id')?(old('project_id')== $val->id?'selected':''):$est->project_id== $val->id?'selected':''}}>{{  $val->name}}</option>
                          @endforeach
                        @endif
                      </select>
                      @error('project_id')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Type</label><span class="text-danger"> *</span>
                      <select class="form-control" name="type" required>
                        <option value="">-</option>
                        @if (isset($data['estate_type']))
                          @foreach ($data['estate_type'] as $val)
                            <option value="{{ $val->id }}" {{old('type')?(old('type')==$val->id?'selected':''):$est->type_id==$val->id?'selected':''}}>{{ $val->name}}</option>
                          @endforeach
                        @endif
                      </select>
                      @error('type')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="size"> Size</label>
                      <div class="input-group-append">
                        <input type="number" class="form-control" id="size" name="size" placeholder="Enter size" value="{{old('size')?old('size'):$est->size}}">
                        <select class="custom-select" name="unit_id">
                          <option value="">-</option>
                          @if (isset($data['unit']))
                          @foreach ($data['unit'] as $val)
                          <option value="{{ $val->id }}" {{old('unit_id')?(old('unit_id')==$val->id?'selected':''):$est->unit_id==$val->id?'selected':''}}>{{ $val->name}}</option>
                          @endforeach
                        @endif
                        </select>
                      </div>
                      @error('size')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      @error('unite_id')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="price"> Price</label><span class="text-danger"> *</span>
                      <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required value="{{old('price')?old('price'):$est->price}}">
                      @error('price')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    


                    <div class="form-group">
                      <label for="build_year">Build Year</label>
                      <input type="text" class="form-control" pattern="\d{4}" maxlength="4" id="build_year" name="build_year" placeholder="Enter Build Year (YYYY)"  value="{{old('build_year')?old('build_year'):$est->build_year}}">
                    </div>

                    <div class="form-group">
                      <label for="des">Description</label>
                      <textarea class="form-control" id="des" name="des" cols="30" rows="5" placeholder="Enter Description">{{old('des')?old('des'):$est->des}}</textarea>
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

    
$(document).ready(function () {});


</script>




@endsection