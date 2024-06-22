@push('css')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">
@endpush
@extends('splendid.master')
@section('content')
<section class="products" style="padding-top:100px;">
    <div class="container">
        <div class="row">
        <div class="col-md-10 offset-md-1">
        <div class="row py-4">
            <div class="col-md-6 ">
                <h3 class="text-default-color ">Splendid</h3>
                <p class="text-main-color pt-5">We have been partnered <br>with AKgoLive and Claw Esports.</p>
            </div>
            <div class="col-md-6 ">
                <img src="/images/sca1.png" alt="product" style="width:100%;height:450px">
            </div>
            </div>
            </div>
        </div>
        <div class="row py-4" style="margin:0 0 30px;">
            
              
        <div class="col-md-10 offset-md-1 ">
            <h3 class="text-default-color">Splendid's Partnership</h3>
            <hr style="margin-top: 1rem; margin-bottom: 1rem;border: 0;border-top: 1px solid white;">
        </div>
    
    
        <div class="row">
        @foreach($data as $key=>$item)
        
            <div class="col-md-10 offset-md-1">
            
                <div class="row">
                    <div class="col-md-8 ">
                    <img src="{{ URL::to('/') }}/uploads/{{ $item->image }}"   class="img-fluid py-4 ml-2" style="width:300PX;height:300px"/>
                        
                    </div>
                    <div class="col-md-4 text-white py-5">
                        
                        <h4>{{$item->partner_name}}</h4>
                        <a href="{{$item->partner_link}}" class="text-default-color pt-3">Learn More&nbsp;&nbsp;>></a>
                    
                    </div>
                </div>
            
            
            </div>
            @endforeach
                        
                
            </div>
         </div>
                   
                   
                    
                 
        </div>
    </section>
    @endsection
    @push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".searchicon").click(function () {
                $(".search-box").toggle();
                $("input[type='text'].search").focus();
            });
            var count = 0;
            $(".add").click(function () {
                count++;
                $(".count").html(count);
                $(".count").css("background", "#F70024");
            });
        });
    </script>
    @endpush