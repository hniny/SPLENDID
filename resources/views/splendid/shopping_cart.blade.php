@push('css')
<link rel="stylesheet" href="{{ asset('../css/cart.css') }}">
@endpush
@extends('splendid.master')
@section('content')
<section class="shoppingCart" style="padding-top:115px;">
    <div class="container">
        <nav aria-label="breadcrumb" class="pb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                
            </ol>
        </nav>
        <h1 class="title d-inline">Your Shopping Cart</h1>
        <h6 class="info pt-3" style="font-size:20px;text-align:right;">
            <span style="color:#E91D24">{{ $rows }}</span> products in cart</h6>    
        <div class="row cartRow mt-5" style="">
            <div class="col-md-2 col-xs-12">
                <h6 class="info">Product</h6>
            </div>
            <div class="col-md-2 col-xs-12">
                <h6 class="info">Name</h6>
            </div>
            <div class="col-md-2 col-xs-12">
                <h6 class="info">Price</h6>
            </div>
            <div class="col-md-3 col-xs-12">
                <h6 class="info" style="padding-left:2em">Quantity</h6>
            </div>
            <div class="col-md-3 col-xs-12">
                <h6 class="info">Total Price</h6>
            </div>
        </div>
        @foreach ($cart as $item)
        <div class="row mt-4">
            <div class="col-md-2 col-xs-12">
                <h6 class="info"><img src="../uploads/{{ $item->product_img }}" alt="laptops" class="headset" style="width:150px;" /></h6>
            </div>
            <div class="col-md-2 col-xs-12">
                <h6 class="info" style="padding-top:35px;">{{ str_limit($item->name,25) }}</h6>
            </div>
            <div class="col-md-2 col-xs-12">
                <input type="hidden" class=" price{{ $item->id }} " value="{{ $item->price }}">
                <h6 class="info txt-price" style="padding-top:35px;">$ {{ $item->price }}</h6>
            </div>
            <div class="col-md-3 col-xs-12">
                    <div class="info wrap" style="padding-top:28px;">
                    <button type="button" id="sub"  class="sub btn-minus" data-id="{{ $item->id }}" data-rawid="{{ $item->__raw_id}}">-</button>
                    <input class="count pl-2 qty{{ $item->id }} txt-qty" data-id="{{ $item->id }}"
                    data-rawid="{{ $item->__raw_id}}" id="count" type="text" value="{{ $item->qty }}" style="text-align:center; min="1" max="1000" />
                    <button type="button" id="plus" class="plus btn-plus" data-id="{{ $item->id }}" data-rawid="{{ $item->__raw_id}}">+</button>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <h6 class="info" style="padding-top:35px;">$ <span class="total{{$item->id}}">{{ $item->qty*$item->price }}</span></h6>
            </div>
            <div class="col-md-1 col-xs-12">
                <form action="/shoppingCartdelete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $item->__raw_id}}">
                    <button class="info" onclick="return confirm('Are you sure?')" style="margin-top:1.8em;background:none;border:none;"><i class="fas fa-trash-alt"></i></button>
                </form> 
            </div>
        </div><hr>
        @endforeach
        <div class="row pt-3">
            <div class="col-md-9 col-xs-12">
                <h6 class="info" style="font-size:21px;">Accept Payment Options</h6>
                <img src="{{ asset('../images/payment.png') }}" alt="payment" class="pt-2">
            </div>
            <div class="col-md-2 col-xs-12 pt-2">
                <h6 class="info" style="font-size:18px;">Total Item Price</h6>
            </div>
            <div class="col-md-1 col-xs-12 pt-2">
                <h6 class="info" style="font-size:18px;position:absolute;" id="totalPrice">$ {{ $total }}</h6>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-9 col-xs-12">
                <a href="/" class="btn add">Continue Shopping<img src="/images/arrow.png" alt="arrow"/></a>
            </div>
            <div class="col-md-3 col-xs-12">
                <a href="/showCheckoutview" class="btn check" style="width:100%;background:#E91D24;"><img src="/images/checkout.png" alt="arrow" class="pb-1" style="width:18px;"/> Checkout</a>
            </div>
        </div><br><br>
    </div>
</section>
@endsection
@push('script')
  <script>
  function calculate(rawId,id,qty,price) {
      var total = qty*price;
      console.log("total :"+total);
      $('.total'+id).html(total);
      $.ajax({
            type:'get',
            url:'/shoppingCartUpdate/'+rawId+'/'+qty,
            success:function(data){
                console.log(data);
                $('.total'+id).html(data.item.total);
                $('#totalPrice').html('$ '+data.total);
            }
        });
  }
  $(document).ready(function(){
    $('.btn-minus').click(function(){
        var id=$(this).data("id");
        var rawId=$(this).data("rawid");
        var qty=$('.qty'+id).val();
        if(qty>1){
            $('.qty'+id).val(qty-1);
        var price=$('.price'+id).val();
        calculate(rawId,id,qty-1,price);
        }
    }); 

    $('.btn-plus').click(function(){
        var id=$(this).data("id");
        var rawId=$(this).data("rawid");
        console.log("Raw ID : "+rawId);
        var qty=$('.qty'+id).val();
        qty=parseInt(qty);
        $('.qty'+id).val(qty+1);
        var price=$('.price'+id).val();
        calculate(rawId,id,qty+1,price);
    }); 

    $('.txt-qty').keyup(function() {
        var id=$(this).data("id");
        var rawId=$(this).data("rawid");
        console.log("Raw ID : "+rawId);
        var qty=$('.qty'+id).val();
        var price=$('.price'+id).val();
        calculate(rawId,id,qty,price);
    });

    $('.txt-qty').keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });

  });
  </script>
@endpush