@push('css')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">
@endpush
@extends('splendid.master')
@section('content')
<section class="products" style="padding-top:100px;">
    <div class="container">
        <img src="/images/productsbk.png" alt="product" width="100%">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="but">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->parent->name }}</li>
                
            </ol>
        </nav>
        <div class="row" style="margin:0 0 30px;">
            <div class="col-md-12 right-list">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{ $category->name }}</h3>
                        
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="form-group row" style="margin: 0 0 1rem;">
                                <label for="sorting" class="col-sm-6 col-form-label">Sort by</label>
                                <div class="col-sm-6">
                                    <select class="mdb-select md-form">
                                        <option value="" disabled selected>Latest</option>
                                        <option value="1">Popular</option>
                                        <option value="2">Promotion</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                        </form>
                        
                    </div>
                    
                </div>
                
                @foreach ($category->product->chunk(3) as $chunk)
                <div class="row card-lists">
                    @foreach ($chunk as $item)
                    {{-- {{ dd($item) }} --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="img">
                                <img src="../uploads/{{ $item->product_img }}" alt="popular" width="150" />
                                
                            </div>
                            <h5 class="text-center">{{ $item->product_name }}</h5>
                            <p class="text-center">PRICE- US ${{ $item->price }}</p>
                            <div class="box-content">
                                <h5 class="title">{{ $item->product_name }}</h3>
                                    <span class="icon"><a href="/product_detail/{{ $item->id }}" class="but">See More</a></span>
                                </div>
                                
                            </div>
                            
                        </div>
                        @endforeach  
                    </div>
                    @endforeach
                    
                    
                </div>
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