@push('css')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">
@endpush
@extends('splendid.master')
@section('content')
<section class="products" style="padding-top:100px;">
    <div class="container">
        <h2 class="text-default-color text-center py-5">Product Content</h2>
        
        <div class="row" style="margin:0 0 30px;">
            <div class="col-md-12 right-list">
                
                
                <div class="row card-lists">
                    {{-- {{ dd($item) }} --}}
                    @foreach ($data as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="img">
                                <img src="{{ URL::to('/') }}/uploads/{{ $item->content_image }}"   class="img-fluid py-1"/>
                                
                            </div>
                            <h5 class="text-center py-4">{{$item->title}}</h5>
                            <div class="box-content">
                            <h5 class="title">{{$item->title}}</h3>
                                <span class="icon"><a href="/product_content/detail/{{ $item->id }}" class="but">See More</a></span>
                            </div>
                            
                        </div>
                        
                    </div>
                    @endforeach
                    
                     
                        
                        </div>
                    
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