@push('css')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">
<link rel="stylesheet" href="{{ asset('../css/product_detail.css') }}">
@endpush
@extends('splendid.master')
@section('content')

<div class="container">
    <h1 class="text-center promo" style="padding-top: 100px;">Promotion Item</h1>
    <div class="row adjust popular">
        @foreach ($promotion as $k=>$v)
            @if ($k % 2 == 0)
                <div class="row adjust col-md-4 red">
                    <div class="col-md-6">

                        <table style="margin-top: 50px;">
                            <tr>
                                <td><h5 class="populartitle">Product</h5></td>
                                <td style="color: white !important;">:</td>
                                <td style="color: white !important;">{{$v->product_name}}</td>
                            </tr>
                            <tr>
                                <td><h5 class="populartitle">Category</h5></td>
                                <td style="color: white !important;">:</td>
                                <td style="color: white !important;">{{$v->category->parent->name}}</td>
                            </tr>
                            <tr>
                                <td><h5 class="populartitle">Price</h5></td>
                                <td style="color: white !important;">:</td>
                                <td style="color: white !important;">
                                   @if ($v->promo_price == null)
                                        $ {{$v->price}}
                                    @else
                                        <span style="text-decoration: line-through;">$ {{$v->price}}</span> | <br> $ {{$v->promo_price}}    
                                    @endif
                                </td>
                            </tr>
                        </table>
                        @if ($v->gift_item == 'on')
                        
                            <div class="form-group">
                                <input type="checkbox" name="gift_item" id="" checked onclick="return false;">
                                <label for="">Gift this item</label>
                            </div>
                        @endif
                        <p>{{$v->short_description}}</p>
                        
                    </div>
                     <div class="col-md-6">
                                
                        @if ($v->new_item == 1)
                            <span class="new newred">New</span>
                            <div class="popularimg" style="margin-bottom: 30px;">
                            
                                <img src="{{asset('uploads/'.$v->product_img)}}" alt="desktop" width="100%" />
                            
                            </div>
                        @else
                            <div class="popularimg" style="margin-top: 30px !important;">
                            
                                <img src="{{asset('uploads/'.$v->product_img)}}" alt="desktop" width="100%" />
                            
                            </div>
                        @endif

                        <a href="/product_detail/{{$v->id}}" class="but">View Detail</a>
                        
                    </div>
                </div>
            @else
                <div class="row adjust col-md-4 black">
                    <div class="col-md-6">

                        <table style="margin-top: 50px;">
                            <tr>
                                <td><h5 class="populartitle">Product</h5></td>
                                <td style="color: white !important;">:</td>
                                <td style="color: white !important;">{{$v->product_name}}</td>
                            </tr>
                            <tr>
                                <td><h5 class="populartitle">Category</h5></td>
                                <td style="color: white !important;">:</td>
                                <td style="color: white !important;">{{$v->category->parent->name}}</td>
                            </tr>
                            <tr>
                                <td><h5 class="populartitle">Price</h5></td>
                                <td style="color: white !important;">:</td>
                                <td style="color: white !important;">
                                    @if ($v->promo_price == null)
                                        $ {{$v->price}}
                                    @else
                                        <span style="text-decoration: line-through;">$ {{$v->price}}</span> | <br> $ {{$v->promo_price}}    
                                    @endif
                                </td>
                            </tr>
                        </table>
                        @if ($v->gift_item == 'on')
                        
                            <div class="form-group">
                                <input type="checkbox" name="gift_item" id="" checked onclick="return false;">
                                <label for="" style="color: white !important;">Gift this item</label>
                            </div>
                        @endif
                        <p>{{$v->short_description}}</p>
                        
                    </div>
                     <div class="col-md-6">
                                
                        @if ($v->new_item == 1)
                            <span class="new newred">New</span>
                            <div class="popularimg" style="margin-bottom: 30px;">
                            
                                <img src="{{asset('uploads/'.$v->product_img)}}" alt="desktop" width="100%" />
                            
                            </div>
                        @else
                            <div class="popularimg" style="margin-top: 30px !important;">
                            
                                <img src="{{asset('uploads/'.$v->product_img)}}" alt="desktop" width="100%" />
                            
                            </div>
                        @endif

                        <a href="/product_detail/{{$v->id}}" class="but">View Detail</a>
                        
                    </div>
                </div>
            @endif
        @endforeach
        
    </div>
</div>

@endsection