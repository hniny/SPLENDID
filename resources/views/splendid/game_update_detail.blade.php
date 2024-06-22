@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:6em;">
<div class="position-relative overflow-hidden" style="background-image: url('{{asset('images/Group 5.jpg')}}'); height: 100vh;">
    <div class="col-md-5 p-lg-5 mx-auto text-white">
     
          
      
          <h1 class="display-4 font-weight-bold text-default-color">{{ $data['title'] }}</h1>
          <p class=" font-weight-lighter text-justify"><small>{!! $data['description'] !!}</small></p>
          <dl class="row text-white mt-5">
            <dt class="col-md-3"><p class=" font-weight-bold text-justify"><small>PLAYFORM:</small></p></dt>
            {{-- <dd class="col-md-2"><img src="images/Group 4.png" alt="" class="25"> --}}
                @if ($data['playform1'] == 1)
                <img src="{{asset('images/window.png')}}" alt="" class="25" width="30px" height="30px">
              @endif
              @if ($data['playform2'] == 1)
                <img src="{{asset('images/mac-removebg-preview.png')}}" alt="" class="25" width="35px" height="30px">
              @endif
              @if ($data['playform3'] == 1)
                <img src="{{asset('images/ps-removebg-preview.png')}}" alt="" class="25" width="40px" height="30px">
              @endif
            </dd>
          </dl>
        <dl class="row text-white">
            <dt class="col-md-3"><p class=" font-weight-bold text-justify"><small>GENRES:</small></p></dt>
            @php
                $genre = $data['genre'];
                $g = explode(",", $genre);
            @endphp
            @foreach ($g as $item)
                <dd class="ml-3">
                  <div class="badge badge-dark text-wrap">
                  {{$item}}
                  </div>
                </dd><br>
            @endforeach
            
          </dl>
          <dl class="row">
              
            @if($data['soon'] == 1)
            
            <h6 class="text-white pl-2">{{ $item->soon==1?'Comming Soon':'' }}</h6>
            
            @endif
          </dl>
          
          <a class="btn btn_dc text-white mt-2" href="/game_update">Back</a>
      
      
    </div>
    <!-- <div class="product-device shadow-sm d-none d-md-block"></div> -->
  </div>



@endsection