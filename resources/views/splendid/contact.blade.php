@push('css')

<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<link rel="stylesheet" href="{{ asset('../css/contact.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<section class="products"  style="padding-top:120px;">
    
    <div class="container">
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="but">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                
            </ol>
        </nav>
        
        <h1 class="title pl-4">Contact Us</h1>
        
        <div class="row">
            
            <div class="col-md-6 pl-5">
                
                <img src="{{ asset('./images/splendid_cover.jpg') }}" alt="" style="width:100%;height: 350px;padding-top: 50px;">
                
            </div>
            
            <div class="col-md-6">
                
                <div class="row pt-5">
                    
                    <div class="col-md-6">
                        
                        <div class="row">
                            
                            <div class="col-md-1">
                                
                                <i class="fas fa-map-marker-alt" style="color:#E91D24"></i>
                                
                            </div>
                            
                            <div class="col-md-10">
                                
                                <h5 class="info">Splendid 1</h5>
                                
                                <p style="color: #B8B8B8B8;font-size: 15px;text-align: justify;">No.148, Ground Floor, Anawyahtar Road,(Corner of 35 street), Kyauktada Township,Yangon.</p>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        
                        <h5 class="info">Splendid 2</h5>
                        
                        <p style="color: #B8B8B8B8;font-size: 15px;">No,91, U Chit Maung Road, Bahan Township, Yangon.</p>
                        
                    </div>
                    
                </div>
                
                <div class="row pt-1">
                    
                    <div class="col-md-6">
                        
                        <div class="row">
                            
                            <div class="col-md-1">
                                
                                <i class="fas fa-mobile-alt" style="color:#E91D24"></i>
                                
                            </div>
                            
                            <div class="col-md-5">
                                
                                <h5 class="info1">Sale</h5>
                                
                                <p style="color: #B8B8B8B8;font-size: 15px;text-align: justify;">09 952204996</p>
                                
                            </div>
                            
                            <div class="col-md-5">
                                
                                <h5 class="info1">Service</h5>
                                
                                <p style="color: #B8B8B8B8;font-size: 15px;text-align: justify;">09 952204996</p>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                
                                <h5 class="info1">Sale</h5>
                                
                                <p style="color: #B8B8B8B8;font-size: 15px;text-align: justify;">09 254909085</p>
                                
                            </div>
                            
                            <div class="col-md-6">
                                
                                <h5 class="info1">Service</h5>
                                
                                <p style="color: #B8B8B8B8;font-size: 15px;text-align: justify;">09 975462716</p>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="row pt-1">
                    
                    <div class="col-md-6">
                        
                        <div class="row">
                            
                            <div class="col-md-1">
                                
                                <i class="fas fa-envelope" style="color:#E91D24"></i>
                                
                            </div>
                            
                            <div class="col-md-10">
                                
                                <h5 class="info">Email</h5>
                                
                                <p style="color: #B8B8B8B8;font-size: 15px;text-align: justify;">splendidexperience@gmail.com</p>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="row pt-1">
                    
                    <div class="col-md-6">
                        
                        <div class="row">
                            
                            <div class="col-md-1">
                                
                                <img src="images/social.png" alt="">
                                
                            </div>
                            
                            <div class="col-md-10">
                                
                                <h5 class="info">Social Networks</h5>
                                
                                <span style="color: #B8B8B8B8;"><i class="fab fa-facebook"><a href="https://www.facebook.com/splendid.myanmar/" class="login"> Facebook</a></i></span><br>
                                
                                
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                
                
            </div>
            
        </div>
        
        <div class="row">
            
            <div class="col-md-6 pl-5">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                
                <form action="/contact" method="post" >
                    {{ csrf_field() }}
                   
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
                        <input type="text" class="form-control" name="ph" style="background-color: #0000;border-color:white;color:#B8B8B8" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="text-main-color ">Comment</label><br>
                        <textarea name="comment" id=""   style="background-color: #0000;border-color:white;color:#B8B8B8;width:100%" autocomplete="off"></textarea>
                    </div>
                    
                    <button type="submit" class="btn" style="width: 100%;background-color:#E91D24;color: white;">Send</button>
                    
                </form>
                    
                    
                
            </div>
            
            <div class="col-md-6">
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1909.9982243324378!2d96.15998699748742!3d16.776852294837134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19149aaf4ff13%3A0x99ec48c2e4ee8955!2sSplendid!5e0!3m2!1sen!2smm!4v1572931373706!5m2!1sen!2smm" width="100%" height="480" frameborder="0" style="border:0;padding-top: 30px;" allowfullscreen=""></iframe>
                
            </div>
            
        </div>
        
        
        
    </div>
    
</section><br>

@endsection