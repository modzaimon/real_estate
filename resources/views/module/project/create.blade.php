@php
    $page_name = explode('/',url()->current())[3];
@endphp

@extends('lte3.layouts.app')

@section('title',ucfirst($page_name))

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

@endsection

@section('content')
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Creat </h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('project.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="name"> Name</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required value="{{old('name')}}">
                      @error('name')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Type</label><span class="text-danger"> *</span>
                      <select class="form-control" name="type" required>
                        <option value="">-</option>
                        @foreach ($data['project_type'] as $val)
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
                      <label>Developer</label>
                      <select class="form-control" name="developer_id" >
                        <option value="">-</option>
                        @foreach ($data['brand'] as $val)
                        <option value="{{ $val->id }}" {{old('developer_id')== $val->id?'selected':''}}>{{ $val->brand->name.' : '. $val->name}}</option>
                        @endforeach
                      </select>
                      @error('developer_id')
                        <span class="invalid-feedback " role="alert" style="display:block">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea class="form-control" id="address" name="address"  cols="30" rows="5" placeholder="Enter address">{{old('address')}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="district">District</label>  <span class="text-danger"> *</span><small class="ml-3"> **Enter more than 3 characters with search district</small>
                      <input type="text" class="form-control bg-warning " id="district" name="district" placeholder="Search District with name " required value="{{old('district')}}">
                      <div class="position-absolute invisible">
                        <input type="text" class=" " id="district_id" name="district_id"  required value="{{old('district_id')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="location">location</label>
                      <input type="text" class="form-control" id="location" name="location" placeholder="Enter location"  value="{{old('location')}}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

    
$(document).ready(function () {

  $('#district').autocomplete({
    minLength: 3,appendTo: '#menu-container',
    source: function( request, response ) {
      const route = "{{ route('getDistrictByName') }}";
      $.ajax({
        url: route,
        type: 'GET',
        dataType: "json",
        data: {
           name: request.term.trim()
        },
        success: function( data ) {
          let  arr = [];
          data.map(function(val,key){
            arr.push({
              'label' : val.name_th+'  '+val.amphure.name_th+'  '+val.amphure.province.name_th+'  '+val.zip_code,
              'district_id' : val.id,
              // 'amphure_id'  : val.amphure.id,
            });
          }); 
          response( arr);
        }
      });
    },
    open: function(event, ui) { 
      $('ul.ui-menu').css({'overflow-y':'auto','overflow-x':'hidden','max-height':'300px'});
    },
    select: function (event, ui) {
      $(this).addClass('is-valid');
      $(this).val(ui.item.label);
      $('#district_id').val(ui.item.district_id);

        // console.log(ui.item); 
       return false;
    },
  }).focus(function (e) { 
      $(this).removeClass('is-valid').val('');
      $('#district_id').val('');
  });
  
});

</script>




@endsection