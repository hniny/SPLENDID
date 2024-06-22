@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Category
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Parent Category :</label>
                    <input type="text" class="form-control" value="{{ $product->category->parent->name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Category :</label>
                    <input type="text" class="form-control" value="{{ $product->category->name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Image :</label><br>
                    <img src="/uploads/{{ $product->product_img }}" class="img-thumbnail" width="200" height="200">
                </div>
                <div class="form-group">
                    <label>Product Name :</label>
                    <input type="text" class="form-control" value="{{ $product->product_name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Descritipon:</label>
                    <textarea id="summernote" class="form-control" disabled>{!!$product->description !!}</textarea>
                </div>
                <div class="form-group">
                    <label>Price :</label>
                    <input type="text" class="form-control" value="{{ $product->price }}" readonly>
                </div>
                <div class="form-group">
                    <label>Rating :</label>
                    <input type="text" class="form-control" value="{{ $product->rating }}" readonly>
                </div>
                <div class="form-group">
                    <label>New Arrival Item :</label><br>
                    @if ($product->new_item == 1 )
                    <label class="font-weight-bold btn-sm btn-light text-secondary active text-center" style="width:10%;">
                        Yes
                    </label>
                    @else
                    <label class="font-weight-bold btn-sm btn-light text-danger active text-center" style="width:10%;">
                        No
                    </label>
                    @endif
              </div>
              <div class="form-group">
                <label>Hot Item :</label><br>
                @if ($product->hot_item == 1 )
                <label class="font-weight-bold btn-sm btn-light text-secondary active text-center" style="width:10%;">
                    Yes
                </label>
                @else
                <label class="font-weight-bold btn-sm btn-light text-danger active text-center" style="width:10%;">
                    No
                </label>
                @endif
          </div>
              
            <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancle</a>
        </div>
    </div>
</div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#summernote').summernote('disable');
    });
</script>
@endpush