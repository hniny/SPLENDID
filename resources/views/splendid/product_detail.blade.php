@push('css')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">
<link rel="stylesheet" href="{{ asset('../css/product_detail.css') }}">
@endpush
@extends('splendid.master')
@section('content')
<div class="product-detail container" style="padding-top:130px;">
    
    
    <div class="row">
        
        <div class="col-md-6">
            <!-- <h1 class="title">GT Series</h1> -->
            <img src="../uploads/{{ $product->product_img }}" alt="laptops" class="headset" width="550" />
        </div>
        <div class="col-md-6">
            
            
            {{-- {!! $product->description !!}  --}}
            
            <div class="contain">
                <div class="left">
                    
                        @if ($product->promo_price == null)
                           <h3 class="price"> PRICE </h3><br>
                           <h3 class="prices"> US $ {{ $product->price }}</h3>
                        @else
                            @php
                                $promotion_price = $product->price - $product->promo_price;    
                            @endphp
                            <h3 class="price"> PRICE </h3><br>
                            <h3 class="prices">US $ {{ $product->promo_price }} <span style="text-decoration: line-through;font-size: 16px;">$ {{ $product->price }} </span><span style="font-size: 16px;">( ${{ $promotion_price}} off )</span>
                            </h3>
                        @endif
                    
                </div>
                <div class="float-right">
                    <h3 class="price" style="color: red;">Rating</h3>
                    @for ($i = 0; $i < $product->rating; $i++)
                        <i class="fas fa-star" style="color: yellow;"></i>
                    @endfor
                </div>
                
            </div>
            @if($product->gift_item == 'on')
                <div class="choose pl-1">
                    <div class="qty">
                        <h3 class="price" style="color: red !important;">Gifted Items</h3>
                        <div class="wrap">
                            {!! $product->short_description !!}
                        </div> 
                    </div>
                </div>
            @endif
            @if($product->hot_item == 1)
            <div class="checkbox">
                <label class="price" style="color: red !important;"><input type="checkbox" value="{{$product->hot_item}}" {{$checked}} name="hot_item" > &nbsp;&nbsp;&nbsp;Hot Item</label>
            </div>
            @endif
            <div class="choose pl-1">
                <div class="qty">
                    <h3 class="price" style="color: red !important;">Quantity</h3>
                    <div class="wrap">
                        <button type="button" id="sub" class="sub">-</button>
                        <input class="count pl-2 txt-qy" id="count" type="text" value="1" min="1" max="1000" />
                        <button type="button" id="plus" class="plus">+</button>
                    </div> 
                </div>
            </div>
            
            <div class="pt-5">
                <a  class="btn-add add but" style="cursor:pointer;" data-id="{{ $product->id }}">Add To Cart<img src="/images/arrow.png" alt="arrow" /></a>
                <a href="/products/{{ $product->category->id }}" class="back but"><i class="fas fa-angle-double-left"></i>Back</a>
            </div>
        </div>
    </div>
    
    <h3 class="title pt-5" style="text-decoration: underline;text-decoration-color:#E91D24;text-underline-position:under;">{{ $product->product_name }}</h3><br>
    {!! $product->description !!}

    @if(isset($accitem))
    <table class="table table-bordered">
        @foreach ($accitem as $v)
            <tr>
                <td>{{$v->item_name}}</td>
                <td>{{$v->item_value}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</div>
<div class="related">
    <h3 class="title">Related Products</h3>
    @foreach ($product->category->product->chunk(4) as $chunk)
    <div class="row card-lists">
        @foreach ($chunk as $item)
        <div class="col-md-3">
            <div class="card">
                <div class="img">
                    <img src="../uploads/{{ $item->product_img }}" alt="popular" width="150" />
                </div>
                <h5 class="text-center">{{ $item->product_name }}</h5>
                <p class="text-center">PRICE- US ${{ $item->price }}</p>
                <div class="box-content">
                    <h5 class="title">{{ $item->product_name }}</h3>
                        <span class="icon"><a href="/product_detail/{{ $item->id }}" class="but">See More</a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach 
    </div>
    @endsection
    @push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".searchicon").click(function () {
                $(".search-box").toggle();
                $("input[type='text'].search").focus();
            });
            // var count = 0;
            // $(".add").click(function () {
                //         count++;
                //     $(".count").html(count);
                //     $(".count").css("background", "#F70024");
                // });
                $('.plus').click(function () {		
                    var th = $(this).closest('.wrap').find('.count');    	
                    th.val(+th.val() + 1);
                });
                $('.sub').click(function () {
                    var th = $(this).closest('.wrap').find('.count');    	
                    if (th.val() > 1) th.val(+th.val() - 1);
                });
                $('.btn-add').click(function(){
                    var id=$(this).data("id");
                    var count=$('#count').val();
                    $.ajax({
                        url:'/add_cart',
                        type:'get',                                                                           
                        data:{'id':id,'qty':count},
                        success:function(data){
                            console.log(data);
                            showCart();
                        }
                    });
                });
                
                $('.txt-qy').keypress(function (e) {
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
