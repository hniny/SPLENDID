@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:7em;">
    <div class="container">
        <div class="row">
           <div class="col-md-12">
            <h2 class="text-default-color">2018</h2>
           </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <img src="images/ev1/20.jpg" alt="" srcset="" class="img-fluid">
            </div>
            <div class="col-md-6 text-white">
                <h3>PC DIY Workshop <br>  28th October 2018</h3>
                <a href="/event1" class="btn btn_dc text-white">Learn More</a>
            </div>
        </div>
        <br>
        <div class="row">
           <div class="col-md-12">
            <h2 class="text-default-color">2019</h2>
           </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 text-white">
                <h3>Gamer Gathering Post  <br>  16 June 2019</h3>
                <a href="/event2" class="btn btn_dc text-white">Learn More</a>
            </div>
            <div class="col-md-6">
                <img src="images/ev2/2.jpg" alt="" srcset="" class="img-fluid">
            </div>
        </div>
      
        <br>
        <div class="row">
            <div class="col-md-6">
                <img src="images/ev3/7.jpg" alt="" srcset="" class="img-fluid">
            </div>
            <div class="col-md-6 text-white">
                <h3>MSI PC Workshp & Geforce RTX Show Case <br> 20 July 2019</h3>
                <a href="/event3" class="btn btn_dc text-white">Learn More</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 text-white">
                <h3>ROG Roadshow <br> 12 to 14 July 2019</h3>
                <a href="/event4" class="btn btn_dc text-white">Learn More</a>
            </div>
            <div class="col-md-6">
                <img src="images/ev4/21.jpg" alt="" srcset="" class="img-fluid">
            </div>
        </div>
    </div>
</div> <br>

@endsection