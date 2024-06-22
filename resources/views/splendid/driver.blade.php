@push('css')
<link rel="stylesheet" href="{{ asset('../css/driver.css') }}">
@endpush
@extends('splendid.master')
@section('content')
<section class="products" style="padding-top:120px;">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="but">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Driver Download</li>
            
        </ol>
    </nav>
    <h2 class="text-uppercase text-white">Driver & Download</h2>
        <div class="row pt-4">
          
          @foreach ($data as $key=>$item)
            <div class="col-md-4">
                <div class="card mb-4 driver_card">
                  <img src="{{asset('uploads/'.$item->image )}}" class="card-img-top" />
                  <div class="card-body">
                  <h5 class="card-title text-white text-center">{{ $item->title }}</h5>
                    <div class="text-center pt-2"><a class="btn btn-sm btn_dc text-white" href="{{ $item->down_link }}">Download Link</a></div>
                    
                </div>
              </div>
            </div>
            @endforeach 
            {{ $data->links() }}
    
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