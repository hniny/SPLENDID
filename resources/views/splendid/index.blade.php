@extends('splendid.master')
@section('content')
<div class="banner" style="padding-top:100px">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./images/slider/banner1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/slider/banner2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/slider/banner3.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/slider/banner4.jpg" alt="Fouth slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images/slider/banner5.jpg" alt="Fifth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="feature-gear">
    <h1 class="bktext">NEW ARRIVAL</h1>
    <div class="feature-list container">
        <h1 class="title">New Arrival</h1>
        <p style="color:#B8B8B8;text-align:right;padding-bottom:30px;">Most Popular Gaming Gears</p>
        <div class="owl-carousel owl-theme">
            
            @foreach ($product as $item)
            @if ($item->new_item==1)
            <div class="item">
                <div class="img-container">
                    <img src="../uploads/{{ $item->product_img }}" alt="ability" width="100%">
                </div>
                <div class="info">
                    <h5>{{ str_limit($item->product_name,25) }}</h5>
                    <h3 style="color:#E22122;">US $ {{ $item->price }}</h3>
                    <a href="/product_detail/{{ $item->id }}" class="view-detail but">View Detail</a>
                </div>
                
            </div>
            @endif
            @endforeach
        </div>
    </div>
    
</div>

<h1 class="text-center promo">Hot Item</h1>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
       
        <ol class="carousel-indicators">
            @for($i=1;$i<=count($hot_items);$i++)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class=""></li>
            @endfor;
            
        </ol>
        <div class="carousel-inner">
            
            @php 
                $isFirst= true;
            @endphp
        @foreach ($hot_items as $hot_item)
            <div class="carousel-item  {{$isFirst ? 'active' : ''}}">
                <div class="row adjust detail">
                    <div class="col-md-6 computerimg">
                        <img src="../uploads/{{ $hot_item->product_img }}" alt="ability" width="70%">
                    </div>
                    <div class="col-md-6 text">
                        <h3 class="detailtitle">{{$hot_item->product_name}}</h3>
                        <p class="detailtext">{{$hot_item->description}}</p>
                            
                            {{-- <span class="delete">${{$hot_item->price}}</span> --}}
                            
                            <span class="discount" style="font-size:15px">${{$hot_item->price}}</span>
                            
                            <a href="/product_detail/{{$hot_item->id}}" class="but">View Detail</a>
                            
                        </div>
                    </div>
                    
                </div>
                @php 
                $isFirst= false;
                @endphp
            
        @endforeach
        
    </div>
        
        <a class="carousel-control-prev but" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">‹</span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next but" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">›</span>
            <span class="sr-only">Next</span>
        </a>
        
    </div>

            <h1 class="text-center promo">Promotion Item</h1>
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
                                {{-- <p>{{$v->short_description}}</p> --}}
                                
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
            <br><br>
            <div class="text-center mb-5">
                <a href="/promotions" class="but promotion">View All</a>
            </div>
            
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
                    $('.owl-carousel').owlCarousel({
                        
                        loop: true,
                        
                        margin: 30,
                        
                        nav: true,
                        
                        dots: true,
                        
                        autoplay: true,
                        
                        responsive: {
                            
                            0: {
                                
                                items: 1
                                
                            },
                            
                            600: {
                                
                                items: 1
                                
                            },
                            
                            1000: {
                                
                                items: 4
                                
                            }
                            
                        }
                        
                    });
                });
                
            </script>
            @endpush