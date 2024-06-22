@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">
<style>
    
</style>

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:6em;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <img src="{{ URL::to('/') }}/uploads/{{ $data->content_image }}"   class="w-100 img-fluid"/>

                <div class="description  py-5 small" >
                    {!!$data->content_description!!}
                </div>
            </div>    
        </div>    
    </div> 
</div>

@endsection