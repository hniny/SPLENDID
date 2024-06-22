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
                <li class="breadcrumb-item active" aria-current="page">Warranty</li>
                
            </ol>
        </nav>
        <div class="row" style="margin:0 0 30px;">
            <div class="col-md-12 right-list">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Warranty</h3>
                        
                    </div>
                    <div class="col-md-6">
                        <!-- <form>
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
                            
                        </form> -->
                        
                    </div>
                    
                </div>
                
                <div class="row card-lists">
                    {{-- {{ dd($item) }} --}}
                    
                        
                    @foreach ($sub_categories as  $key=>$category)
                    
                    @if(count($category) <> 0) 
                   
                    <div class="col-md-4">
                        <div class="card">
                            <div class="img">
                                <img src="images/glapt.png" alt="popular" width="150" />
                            </div>

                            <h5 class="text-center">{{$key}} </h5>
                            <!-- <p class="text-center">Warranty</p> -->
                            <div class="box-content">
                                <h5 class="title">{{$key}}</h3>
                            <span class="icon"><a href="/warrantyDetail/{{$key}}/{{$category[0]['category_id']}}" class="btn but">See More</a></span>
                                   
                                </div>
                                
                            </div>
                            
                        </div> 
                   @endif
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

        $(".btn").on('click',function(){
   
   window.location.href = '/warranty_detail';   

  })
    </script>
    @endpush