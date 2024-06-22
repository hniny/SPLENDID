@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:8em;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center text-default-color">
                <h3>MSI PC Workshp & Geforce RTX Show Case - 20 July 2019</h3>
                <hr>
            </div>
        </div>
        <div class="row">
           
            <div class="col-3 mb-2 col-md-3 mb-3">
                <img src="images/ev3/2.jpg" alt="" srcset="" class="img-fluid">
            </div>
            <div class="col-3 mb-2 col-md-3 mb-3">
                <img src="images/ev3/3.jpg" alt="" srcset="" class="img-fluid">
            </div>
            <div class="col-3 mb-2 col-md-3 mb-3">
                <img src="images/ev3/4.jpg" alt="" srcset="" class="img-fluid">
            </div>            
            <div class="col-3 mb-2 col-md-3 mb-3">
                <img src="images/ev3/6.jpg" alt="" srcset="" class="img-fluid">
            </div>
    </div>
    <div class="row">
        <div class="col-6 mb-2 col-md-6 mb-3">
            <img src="images/ev3/5.jpg" alt="" srcset="" class="img-fluid">
        </div>
        <div class="col-6 mb-2 col-md-6 mb-3">
            <img src="images/ev3/1.jpg" alt="" srcset="" class="img-fluid">
        </div>
    </div>
</div>

@endsection