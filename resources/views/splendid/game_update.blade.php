@push('css')



{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}



<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">



@endpush



@extends('splendid.master')



@section('content')



<div style="padding-top:6em;">

<div class="position-relative overflow-hidden bg-dark" style="background-image: url('images/Group 5.jpg'); height: 100vh;">

    <div class="col-md-5 p-lg-5 mx-auto text-white">

      @if (isset($soon))

          <h1 class="display-4 font-weight-bold text-default-color">{{ $soon['title'] }}</h1>

          <p class=" font-weight-lighter text-justify"><small>{!! $soon['description'] !!}</small></p>

          <dl class="row text-white mt-5">

            <dt class="col-md-3"><p class=" font-weight-bold text-justify"><small>PLAYFORM:</small></p></dt>

            {{-- <dd class="col-md-2"><img src="images/Group 4.png" alt="" class="25"> --}}

              @if ($soon['playform1'] == 1)

                <img src="images/window.png" alt="" class="25" width="30px" height="30px">

              @endif

              @if ($soon['playform2'] == 1)

                <img src="images/mac-removebg-preview.png" alt="" class="25" width="35px" height="30px">

              @endif

              @if ($soon['playform3'] == 1)

                <img src="images/ps-removebg-preview.png" alt="" class="25" width="40px" height="30px">

              @endif

            </dd>

          </dl>

        <dl class="row text-white">

            <dt class="col-md-3"><p class=" font-weight-bold text-justify"><small>GENRES:</small></p></dt>

            @php

                $genre = $soon['genre'];

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

            @foreach ($data as $item)

            

            <h6 class="text-white pl-2">{{ $item->soon==1?'Comming Soon':'' }}</h6>

            

            @endforeach

          </dl>

          

         

      @endif

      

    </div>

    <!-- <div class="product-device shadow-sm d-none d-md-block"></div> -->

  </div>



  <div class=" d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="row">
    @foreach ($data as $v)
    <div class="col-md-3 mb-3" >
        <div class=" bg-dark mr-md-3 p-3 px-3 pt-md-1 px-md-5 text-center text-white overflow-hidden border-bottom" >
          <div class="my-3 py-3 " style="height:100px">
            <h5 class="text-default-color" >{{$v->title}}</h5>
            <p style="font_size:0.8rem;font-weight:300">{{$v->game_resource}}</p>
          </div>
          <div class="bg-light shadow-sm mx-auto"><img src="{{asset('uploads/'.$v->image)}}" class="img-fluid" alt="Splendid Myanmar" style="width: 150px;height: 150px;"></div>
        <a class="btn btn_dc text-white mt-4" href="/game_update_detail/{{$v->id}}">More Details</a>
        </div>
      </div>
    @endforeach
   <div class="col-md-12">
    <div class="float-right">
      {{ $data->links() }}
    </div>
   </div>
  </div>
</div>


 

  <div class="jumbotron text-white" style="background-image: url('images/Group 5.jpg');">



    <div class="container">

        <div class="row justify-content-around">

          @foreach ($video as $item)

            <div class="col-md-6">

              <h1 class="">{{$item->title}}</h1>

              <iframe width="100%" height="350" src="{{$item->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>    

          @endforeach

        </div>



    </div>

  </div></div>

  

@endsection