@push('css')



{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}



<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">



@endpush



@extends('splendid.master')



@section('content')



<div style="padding-top:6em;">

<div class="container my-5">
    <div class="row ">
   <div class="col-md-12">
    <label class=" float-right text-danger">
        <img src="./images/flat/us.png" alt="" width="30px">&nbsp;&nbsp;<label>1 USD = </label>&nbsp;&nbsp;<img src="./images/flat/myanmar.png" alt="" width="30px">&nbsp;&nbsp;<label>{{$rates->rate_price}}&nbsp;MMK</label>
        </label>
   </div>
    
    </div>
    <form action="">
        @foreach ($pcCategories as $pcCategory)
       
        <div class="row">
            <div class="col-md-2">
                <div class="form-group text-secondary">
                    <label>{{$pcCategory->cat_name}}</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    
                    <input type="hidden" value="{{$pcCategory->id}}" name="main_id" id="main_id" >
                    
                    <select class="form-control bg-dark text-danger pcIt" id="item_name{{$pcCategory->id}}" name="item_name{{$pcCategory->id}}" > 
                        <option  id="default{{$pcCategory->id}}"   data-id="{{$pcCategory->id}}"  name="default{{$pcCategory->id}}" data-priceuk="0" data-pricemm="0"
                            > Select {{$pcCategory->cat_name}} </option>
                        @foreach ($pcCategory->pcItems as $pcItem)  
                            <option value="{{$pcItem->id}}" data-id="{{$pcCategory->id}}" data-priceuk={{$pcItem->item_price}} data-pricemm="{{$pcItem->getPrice()}}">{{$pcItem->item_name}}   
                            </option> 
                        @endforeach       
                    </select>         
                </div>
        </div>
        <div class="col-md-2">
            <input type="text" value="0" class="form-control bg-dark text-danger" id="uk_price--{{$pcCategory->id}}" name="uk_price--" readonly required>
        </div>
        <div class="col-md-2">
            <input type="text" value="0" class="form-control bg-dark text-danger total" id="mm_price--{{$pcCategory->id}}" name="mm_price--" readonly required>     
        </div> 
        </div>
        
        @endforeach
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-2 text-center">
                <strong class=" text-secondary">Total Amount</strong><br>
            </div>
            <div class="col-md-2">
                <div class="form-group ">                              
                    
                    <input type="text"  readonly class="form-control bg-dark text-danger" name="all_total" id="all_total" >
                    </div>
            </div>
        </div>
    </form>
</div>

</div>

  
@endsection
@push('script')
<script>
   
   $(document).ready(function () {
    var index=$('#main_id').val();
    // var total=0;

       $('.pcIt').change(function(){
        // var total=0;
        var index = $(this).children("option:selected").val();  
         console.log('index ',index)
        var selectedItem = $(this).children("option:selected").data();
        console.log('selectedItem ',selectedItem)
  
         var priceuk = selectedItem.priceuk;
         var pricemm = selectedItem.pricemm;
       
        //  console.log('default',default)
         var id = selectedItem.id;
        $('#uk_price--'+id).val(priceuk);
        $('#mm_price--'+id).val(pricemm);
        // $('#default'+id).val(default);
        // total += pricemm;
        // console.log('total ',total);
        // $('#all_total').val(total);
        calculateTotal();
       });
       

      } );

      function calculateTotal()
      {
          var total = 0;
          $('.pcIt').map(function(){
            var selectedItem = $(this).children("option:selected").data();
            total += parseFloat(selectedItem.pricemm);
          });
          $('#all_total').val(total);
      }
     
</script>
@endpush