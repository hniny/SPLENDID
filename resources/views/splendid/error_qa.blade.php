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
                <li class="breadcrumb-item active" aria-current="page">Error Q&A</li>
            </ol>
        </nav>
        <div class="row" style="margin:0 0 30px;">
            <div class="col-md-12 right-list">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Splendid's Frequently Asked Question</h3> 
                    </div>
                   
                   <div class="col-md-12">
                    @foreach ($data as $item)
                        
                        
                        <h5 class="text-default-color pt-5">Q : <label class="text-white">{{ $item->question}}</label></h5>
                        
                        <h5 class="text-default-color ">A : <label class="text-white">{{ $item->answer}}</label></h5>
                        
                        
                    
                    
                    <hr style="margin-top: 1rem;
                    margin-bottom: 1rem;
                    border: 0;
                    border-top: 1px solid white;">
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