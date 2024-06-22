@push('css')



{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}



<link rel="stylesheet" href="{{ asset('../css/game-update.css') }}">



@endpush



@extends('splendid.master')



@section('content')



<div style="padding-top:3em;">

    

    <div class="position-relative overflow-hidden bg-dark d-none d-sm-block" style="background-image: url('images/splendidbg.jpg'); height: 100vh;background-repeat: no-repeat;background-size:100%;">

        <div class="row splencover">

            <div class="text-white">

                <h3 class="text-default-color text-center">SPLENDID LOCATIONS</h3>

                <p class=" font-weight-lighter text-justify">Visit a Splendid near you to check out the latest technology in gaming. Immerse yourself in the ultimate Razer experience as you get your hands on an impressive range of the best gaming products the world has seen.</p>

                

            </div>

        </div>

        <!-- <div class="product-device shadow-sm d-none d-md-block"></div> -->

    </div>

    

    <div class="container pt-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <img src="images/shop1.jpg" alt="" class="w-100 img-fluid">

                

            </div>

            <div class="col-md-5">

                <h3 class="text-default-color pt-3">Splendid 1 Service</h3>

                <ul class="list-unstyled text-white font-weight-lighter">

                    <li>No.148, Ground Floor-Anawyathar Road. (Corner of 35 Street)</li>

                    <li>Kyauktada Township Yangon.</li>

                    <li>Sale: 📲09-952204996, Service: 📲09-952204995</li>


                </ul>

                

            </div>

        </div>

        

        <div class="row justify-content-center pt-5">

            <div class="col-md-5">

                <img src="images/shop2.jpg" alt="" class="w-100 h-75 img-fluid">

                

            </div>

            <div class="col-md-5">

                <h3 class="text-default-color pt-3">Splendid 2 Service</h3>

                <ul class="list-unstyled text-white font-weight-lighter">

                    <li>No.91, U Chit Maung Road, Bahan Township, Yangon [Near Minn Lan Bus Stop].</li>

                    <li>Sale: 📲09-254909085, Service: 📲09-975462716</li>

                </ul>

                

            </div>

        </div>

        

        

    </div>
</div>


<div class="container pb-5">

    @if($errors->any())      
    <div class="alert alert-warning">
        <ol>          
            @foreach($errors->all() as $error)            
            <li>{{ $error }}</li>          
            @endforeach        
        </ol>      
    </div>    
    @endif 
    
        
<form action="/outlets" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-6 offset-md-3">
        @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
        <h4 class="text-default-color pb-3">Send Your Error Question </h4>
    <div class="form-group">
        <label class="text-main-color ">Enter Your Name</label>
        <input type="text" class="form-control" name="name" style="background-color: #0000;border-color:white;color:#B8B8B8" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="text-main-color ">Enter Your Email</label>
        <input type="text" class="form-control" name="email" style="background-color: #0000;border-color:white;color:#B8B8B8" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="text-main-color ">Enter Your Phone</label>
        <input type="text" class="form-control" name="phone" style="background-color: #0000;border-color:white;color:#B8B8B8" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="text-main-color ">Select Laptop Image</label>
        <div >
            <input type="file" name="image" class="form-control" style="background-color: #0000;border-color:white"/>
        </div>
    </div>
    
      <div class="form-group">
          <input type="submit" name="send" value="Send" class="btn btn-info" style="background-color: #E91D24">
      </div>
    </div>
  </form>
</div>



@endsection