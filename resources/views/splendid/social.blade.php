@push('css')

{{-- <link rel="stylesheet" href="{{ asset('../css/products.css') }}"> --}}

<link rel="stylesheet" href="{{ asset('../css/social.css') }}">

@endpush

@extends('splendid.master')

@section('content')

<div style="padding-top:7em;background-color: #000000;">
    
    <div class="img-wrapper">
        <div class="img-text-group">
            <h2 class="default-color mobile-size">SOCIAL MEDIA</h2>
            <p class="text-white social-font pt-2">Splendid social media channels provide you with multiple ways to communicate with us. <br>
                Your suggestion and feedback will be our precious reference for better services</p>
            </div>
            <img src="images/social.jpg" alt="" style="width: 100%;">
        </div>
        <hr class="ml-5 mr-5" style="background-color: #B8B8B8;">
        <div class="container">
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column mt-5 pt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link social-nav social-font active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Facebook</a>
                            <a class="nav-link social-nav social-font" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Youtube</a>
                            <a class="nav-link social-nav social-font" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Twitter</a>
                            <a class="nav-link social-nav social-font" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-viber" aria-selected="false">Instagram</a>
                            <a class="nav-link social-nav social-font" id="v-pills-viber-tab" data-toggle="pill" href="#v-pills-viber" role="tab" aria-controls="v-pills-viber" aria-selected="false">Viber</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content pt-2" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h4 class="default-color">Splendid Facebook</h4>
                                <a href="https://www.facebook.com/splendid.myanmar/" class="social-nav">
                                <div class="social_link driver_card mt-5">
                                       <p class="social-nav">Splendid FB</p> 
                                </div>
                            </a>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <h4 class="default-color">Splendid Youtube</h4>
                                <a href="https://www.youtube.com/channel/UCz_l7m4II9Moa8FHWy88rqw" class="social-nav">
                                <div class="social_link driver_card mt-5">
                                    <p class="social-nav">Splendid Youtube</p> 
                                </div>
                             </a>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <h4 class="default-color">Splendid Twitter</h4>
                                    <a href="https://www.facebook.com/splendid.myanmar/" class="social-nav">
                                        <div class="social_link driver_card mt-5">
                                            <p class="social-nav">Splendid Twitter</p> 
                                        </div>
                                    </a>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <h4 class="default-color">Splendid Instagram</h4>
                                    <a href="https://www.facebook.com/splendid.myanmar/" class="social-nav">
                                        <div class="social_link driver_card mt-5">
                                            <p class="social-nav">Splendid Instagram</p> 
                                    </div>
                                    </a>
                            </div>
                            <div class="tab-pane fade" id="v-pills-viber" role="tabpanel" aria-labelledby="v-pills-viber-tab">
                                <h4 class="default-color">Splendid Viber</h4>
                                    <a href="https://www.facebook.com/splendid.myanmar/" class="social-nav">
                                        <div class="social_link driver_card mt-5">
                                            <p class="social-nav">Splendid Viber</p> 
                                        </div>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
    
    @endsection