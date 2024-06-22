@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:6em;">

  <div class="jumbotron text-white" style="background-image: url('images/Group 5.jpg');background-repeat:no-repeat;background-size:cover">

    <div class="container">
        
         
              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-uppercase">{{$top->title}}</h4>
                  <iframe width="100%" height="400" src="{{$top->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>

             <div class="row py-4">
              @foreach($videos as $video)
              <div class="col-md-4">
                <h4 class="text-uppercase" style="height:15%">{{$video->title}}</h4>
                <iframe width="100%" height="350" src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              @endforeach
             </div>
        

    </div>
  </div>

  <div class="row">
    
    
  </div>

</div>

@endsection