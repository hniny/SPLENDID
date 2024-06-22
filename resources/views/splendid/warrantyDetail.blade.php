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
        <div class="row pt-4">

          @foreach ($data as $item)
            <div class="col-md-6 " >
              <div class="card   mb-3 warranty_card ">
                  <div class="row no-gutters">
                    <div class="col-md-5">
                      <img src="{{ URL::to('/') }}/uploads/{{ $item->image }}"   class="img-fluid py-4" style="width:200px;height:200px"/>
                    </div>
                    <div class="col-md-7">
                      <div class="card-body">
                        <h5 class="card-title text-default-color">{{ $item->product_name}}</h5>
                        @php
                        $detail = \App\WarrantyDetail::where('warranty_id',$item->id)->get();
                        @endphp
                      @foreach($detail as $i)
                        <label class="text-white">{{$i->warrantydetail_name}} - {{$i->warrantydetail_value}}</label><br>
                        
                      @endforeach
                      </div>
                    </div>
                  </div>
                </div>
          </div>
          @endforeach
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