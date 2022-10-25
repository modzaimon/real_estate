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
        <form action="{{ route('sale.store') }}" method="POST">
          @csrf
          
          <div class="form-group">
            <label for="estate">Estate</label> <span class="text-danger"> *</span>
            <small class="ml-3"> **Enter more than 3 characters with search Estate</small>
            <input type="text" class="form-control bg-warning " id="estate" name="estate" placeholder="Search Estate with name " required value="{{old('estate')}}">
              <div class="position-absolute ">
                {{-- <div class="position-absolute invisible"> --}}
              <input type="text" class=" " id="estate_id" name="estate_id"  required value="{{old('estate_id')}}">
            </div>
          </div>

          <div class="form-group border p-md-3" id ="buyer_field">
            {{-- <label for="estate">Buyer</label>   --}}
            <div class="float-">
              <div class="btn btn-success btn-sm btn_plus_buyer"><i class="fa fa-plus"></i> Add Buyer</div>
            </div>
            <br>
            <div class="callout callout-info buyer_box">
              <div class="float-right">
                <div class="btn btn-sm btn-danger btn_minus_buyer "><i class="fa fa-minus"></i></div>
              </div>
              <p>Buyer <small class="text-red ml-3"> *Enter more than 3 characters with search Estate</small></p>
              <input type="text" class="form-control bg-warning buyer" id="buyer[]" name="buyer[]" placeholder="Search Buyer with name "  value="{{old('buyer[]')}}" required >
              <div class="position-absolute ">
                {{-- <div class="position-absolute invisible "> --}}
                <input type="text" class=" buyer_id" id="buyer_id[]" name="buyer_id[]"   value="{{old('buyer_id[]')}}" required>
              </div>
            </div>
            @error('buyer')
            <span class="invalid-feedback " role="alert" style="display:block">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="district">Seller</label>  <span class="text-danger"> *</span><small class="ml-3"> **Enter more than 3 characters with search Seller</small>
            <input type="text" class="form-control bg-warning " id="seller" name="seller" placeholder="Search Seller with name " required value="{{old('seller')}}">
              <div class="position-absolute ">
                {{-- <div class="position-absolute invisible"> --}}
              <input type="text" class=" " id="seller_id" name="seller_id"  required value="{{old('seller_id')}}">
            </div>
          </div>

          <div class="form-group">
            <label for="des">Description</label>
            <textarea class="form-control" id="des" name="des" cols="30" rows="5" placeholder="Enter Description">{{old('des')}}</textarea>
          </div>

          <button type="submit" class="btn btn-primary float-right">Submit</button>

        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function () {

  $('body').on("click","#estate , #seller , input.buyer ",function(e) {

    $('#estate').autocomplete({
      minLength: 3,appendTo: '#menu-container',
      source: function( request, response ) {
        const route = "{{ route('getEstateByName') }}";
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
                'label' : val.brand_name+' : '+val.number+' : '+val.project_name,
                'value' : val.id,
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
        $('#estate_id').val(ui.item.value);

          // console.log(ui.item); 
        return false;
      },
    }).focus(function (e) { 
        $(this).removeClass('is-valid').val('');
        $('#estate_id').val('');
    });

    $('.buyer').autocomplete({
      minLength: 3,appendTo: '#menu-container',
      source: function( request, response ) {
        const route = "{{ route('getCustomerByName') }}";
        const buyer = $("input[name='buyer_id[]']").map(function(){return $(this).val()}).get();
        $.ajax({
          url: route,
          type: 'GET',
          dataType: "json",
          data: {
            name : request.term.trim(),
            buyer_exist: buyer.filter(function (e) {return e != ''})
          },
          success: function( data ) {
            console.log(data);
            let  arr = [];
            data.map(function(val,key){
              arr.push({
                'label' : val.first_name+'  '+val.last_name,
                'val' : val.id,
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
        $(this).closest('.buyer_box').find('.buyer_id').val(ui.item.val);

          // console.log(ui.item); 
        return false;
      },
    }).focus(function (e) { 
        $(this).removeClass('is-valid').val('');
        $(this).closest('.buyer_box').find('.buyer_id').val('');
    });
  
  });


  $('#buyer_field').on("click",".btn_minus_buyer",function(e) {
    if($('.buyer_box').length > 1) {
      e.target.closest('.buyer_box').remove();
    }else{
      alert("Can't delete last Buyer!");
    }
      console.log($(this));
  });

  $('.btn_plus_buyer').click(function (e) { 
    $ele = $('.buyer_box:first').clone();
    $ele.find("[name='buyer[]']").val('');
    $ele.find("[name='buyer_id[]']").val('')
    $ele.appendTo($('#buyer_field'));
  });

  

});

</script>




@endsection