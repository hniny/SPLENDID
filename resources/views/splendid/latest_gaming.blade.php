@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:3em;">
    <div class="container">
        

          @foreach ($data as $item)
          <div class="row align-items-center py-3">
          <div class="col-md-5">
            <h2 class="text-default-color pt-5">{{ $item->product_name}}</h2> 
            <p class="text-white">{{ $item->desp}}</p>
          <h4 class="text-default-color"><label>$</label>{{ $item->price}}</h4>
          <a class="btn btn_dc text-white mt-4" href="/latest_gaming/latest_gaming_detail/{{ $item->id }}">View More</a>
          </div>
          <div class="col-md-7">
            <img src="{{ URL::to('/') }}/uploads/{{ $item->product_image }}"   class="img-fluid py-5"/>
          </div>
        </div>
        <hr style="margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid white;">
          @endforeach
         
        
      </div>
</div>

@endsection