@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:7em;">
 <h2 class="text-default-color text-center">Benefit</h2>
    <div class="container py-5">
        

            @foreach ($data as $item)
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <h5 class="text-default-color pt-3">{{$item->title}}</h5>
                        <div class="text-white">
                            {!! $item->description !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('uploads/'.$item->card1)}}" alt="Splendid Myanmar" class="w-100 img-fluid">
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('uploads/'.$item->card2)}}" alt="Splendid Myanmar" class="w-100 img-fluid">
                    </div>
                </div><br>
            @endforeach
       

        {{-- <div class="col-md-4">
                <h5 class="text-default-color pt-3">Black Member Card</h5>
                <p class="text-white"><small>25 lakh နှင့် အထက်ဝယ်ယူတဲ့ Customer တိုင်းဟာဆိုရင်ပုံမှာ ပြထားတဲ့ Black Member Card ကိုရရှိမှာဖြစ်ပါတယ်။
                    အကျိုးခံစားခွင့် အနေနဲ့ ကတော့</small>
                    </p>
                <ul class="list-unstyled text-white font-weight-lighter" style="line-height:70%"><small>
                    <li>Accessories 15% off</li>
                    <li>Laptop 1% off</li>
                    <li>Desktop 1% off တွေကိုအမြဲရရှိမှာဖြစ်ပါတယ်။</li></small>
                </ul>
            </div>

            <div class="col-md-4">
                <img src="images/black1.jpg" alt="" class="w-100 img-fluid">
                
            </div>
            

            <div class="col-md-4">
                <img src="images/black2.jpg" alt="" class="w-100 img-fluid">
                
            </div> --}}
        
        {{-- <div class="row justify-content-center pt-5">

            <div class="col-md-4">
                <h5 class="text-default-color pt-3">Red Member Card</h5>
                <p class="text-white"><small>15 lakh နှင့် အထက်ဝယ်ယူတဲ့ Customer တွေကတော့ Red Member Card ကဒ်ကိုရရှိမှာဖြစ်ပါတယ်။
                    အကျိုးခံစားခွင့် အနေနဲ့ကတော့
                    </small>
                    </p>
                <ul class="list-unstyled text-white font-weight-lighter" style="line-height:70%"><small>
                    <li>Accessories 10% off</li>
                    <li>Laptop 1% off ကို အမြဲရရှိမှာဖြစ်ပါတယ်</li></small>
                </ul>
            </div>

            <div class="col-md-4">
                <img src="images/red1.jpg" alt="" class="w-100 img-fluid">
                
            </div>
            

            <div class="col-md-4">
                <img src="images/red2.jpg" alt="" class="w-100 img-fluid">
                
            </div>
        </div><br> --}}

        {{-- <div class="row justify-content-center pt-5">

            <div class="col-md-4">
                <h5 class="text-default-color pt-3">Accessories Card</h5>
                <p class="text-white"><small>Accessories MMK ၆ သောင်းဖို့ ပြည့်အောင်ဝယ်ယူတာနဲ့ Accessories Card လေးကိုရရှိမှာဖြစ်ပါတယ်။ နောက်ထပ် ၆ သောင်းဖိုးပြည့်အောင် တစ်ခါဝယ်ယူတိုင်း 
                    ၁ ကွက်ရရှိမှာဖြစ်ပါတယ်။ဒါ့အပြင်
                    အကျိုးခံစားခွင့် အနေနဲ့ကတော့
                    
                    </small>
                    </p>
                <ul class="list-unstyled text-white font-weight-lighter" style="line-height:70%"><small>
                    <li>၄ ကွက်ပြည့်ရင် 10% OFF</li>
                    <li>၉ ကွက်ပြည့်ရင် 15% OFF</li>
                    <li>၁၀ ကွက်ပြည့်ရင် 20% OFF တွေရရှိမှာဖြစ်ပါတယ်။</li>
                    <li>*  Accessories Card ရဲ့သက်တန်းကတော့ 1 Year ပဲရရှိမှာဖြစ်ပါတယ်။  </li></small>
                </ul>
            </div>

            <div class="col-md-4 pt-3">
                <img src="images/ac1.jpg" alt="" class="w-100 img-fluid">
                
            </div>
            

            <div class="col-md-4 pt-3">
                <img src="images/ac2.jpg" alt="" class="w-100 img-fluid">
                
            </div>
        </div> --}}
        
        
    </div>
</div>

@endsection