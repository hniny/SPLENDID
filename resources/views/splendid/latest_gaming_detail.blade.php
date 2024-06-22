@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:3em;">
      
    <div class="container-fluid">
      <div class="position-relative overflow-hidden " style="background-image: url({{ URL::to('/') }}/uploads/{{ $data->bg_image }}); height: auto;background-size: 100%;">
        
       <div class="container">
        <h2 class="text-center text-default-color" style="padding-top:3.5em;">{{$data->product_name}}'s Specification</h2>
        <div class="row px-5 pt-3">
          <div class="col-md-3">
             <h5 class="text-white" >{{$data->spec1}}</h5>
             <hr style="margin-top: 0.2rem;margin-bottom: 0rem;border: 0;border-top: 2px solid #E91D24;width:80px;float:left"><br>
     
             <ul class="text-white p-0" style="list-style: none;font-weight: 300;font-size: small;">
             <li>{!! $data->spec1_desp !!}</li>
             </ul>
          </div>
          <div class="col-md-3">
           <h5 class="text-white">{{$data->spec2}}</h5>
           <hr style="margin-top: 0.2rem;margin-bottom: 0rem;border: 0;border-top: 2px solid #E91D24;width:80px;float:left"><br>
           <ul class="text-white p-0" style="list-style: none;font-weight: 300;font-size: small;">
             <li>{!!$data->spec2_desp!!}</li>
           </ul>
          </div>
     
          <div class="col-md-3">
           <h5 class="text-white">{{$data->spec3}}</h5>
           <hr style="margin-top: 0.2rem;margin-bottom: 0rem;border: 0;border-top: 2px solid #E91D24;width:80px;float:left"><br>
           <ul class="text-white p-0" style="list-style: none;font-weight: 300;font-size: small;">
             <li>{!!$data->spec3_desp!!}</li>
           </ul>
          </div>
          <div class="col-md-3">
           <h5 class="text-white">{{$data->spec4}}</h5>
           <hr style="margin-top: 0.2rem;margin-bottom: 0rem;border: 0;border-top: 2px solid #E91D24;width:80px;float:left"><br>
           <ul class="text-white p-0" style="list-style: none;font-weight: 300;font-size: small;">
             <li>{!!$data->spec4_desp!!}</li>
           </ul>
          </div>
        </div>
        <a class="btn btn_dc text-white my-3 float-right" href="/latest_gaming">Back</a>
       </div>
   </div>
       </div>
      
    </div>

@endsection