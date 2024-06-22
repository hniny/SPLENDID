@push('css')
<link rel="stylesheet" href="{{ asset('../css/cart.css') }}">
<link rel="stylesheet" href="{{ asset('../css/checkout.css') }}">
@endpush
@extends('splendid.master')
@section('content')

<section class="shoppingCart" style="padding-top:115px;">
    <div class="container">
        <nav aria-label="breadcrumb" class="pb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                
            </ol>
        </nav>
        <br>
        
        <form action="/placeOrder" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <h1 class="text-main-color mb-5">Checkout</h1>
                    <div class="default-card card border-secondary" style="background-color:#242526;">
                        <div class="ml-4 mr-4 mb-3 pt-3 text-main-color">
                            <h4>Your Order</h4>
                            <ul class="list-inline" style="margin-bottom: 0px;padding-top:13px;">
                                <li class="list-inline-item"><h6>Cart Total</h6></li>
                                <li class="list-inline-item float-right">$ {{ $total }} </li>
                            </ul>
                            <ul class="list-inline" style="margin-bottom: 0px;">
                                <li class="list-inline-item"><h6>Delivery Cost</h6></li>
                                <li class="list-inline-item float-right">0.00 $</li>
                            </ul>
                            <hr style="width:30%;background-color:#707070;float:right">
                            <ul class="list-inline" style="padding-top:33px;">
                                <li class="list-inline-item"><h6>Total</h6></li>
                                <li class="list-inline-item float-right text-default-color" name="total">$ {{ $total }}</li>
                            </ul>
                            <hr style="background-color:#707070;">
                            <h4 class="text-main-color">Payment Methods</h4>
                            <div class="custom-control custom-radio" style="padding-top:13px;">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                                <p class="text-secondary h6 mt-2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered 
                                    alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                </div>
                                <div class="custom-control custom-radio pt-2">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2"><img src="/images/payment_card.png" alt=""></label>
                                </div>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input pcheck" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                </div><br>
                                <button type="submit" id="off" class="btn btn-order" disabled>Place Order</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <h4 class="text-main-color">Personal Information</h3>
                            <br>
                            <div class="row pt-1">
                                <div class="col">
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4" class="label-name">Name</label>
                                            <input type="name" name="name" class="default-form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label  class="label-name" for="inputPassword4">Email</label>
                                            <input type="email" name="email" class="default-form-control" id="inputPassword4">
                                        </div>
                                    </div>
                                    <div class="form-row pt-3">
                                        <div class="form-group col-md-6">
                                            <label  class="label-name" for="inputState">City</label>
                                            <select id="inputState" name="city_id" class="default-form-control">
                                                @foreach ($country as $item)
                                                @if (count($item->cityname)>0)
                                                @foreach ($item->cityname as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label  class="label-name" for="inputState">Township</label>
                                            <input type="township" name="township" class="default-form-control" id="ts">
                                        </div>
                                    </div>
                                    <div class="form-group pt-3">
                                        <label  class="label-name"  for="inputAddress2">Address</label>
                                        <textarea class="default-form-control" id="exampleFormControlTextarea1" name="address" rows="6" style="margin-top: 0px; margin-bottom: 0px; height: 200px !important;"></textarea>
                                    </div>
                                    <div class="form-row pt-3">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4" class="label-name">Phone</label>
                                            <input type="text" name="phone" class="default-form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label  class="label-name" name="post_code" for="inputPassword4">Post Code</label>
                                            <input type="number" name="post_code" class="default-form-control" id="inputPassword4">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check float-right pt-2">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label text-main-color" for="gridCheck">
                                                Create new account ?
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <br><br>
        @endsection
        @push('script')
        <script>
            $(document).ready(function () {
                $(function () {
                    $('.pcheck').click(function () {
                        $('#off').prop('disabled', !$('.pcheck:checked').length);
                    });
                });
            });
        </script>
        @endpush