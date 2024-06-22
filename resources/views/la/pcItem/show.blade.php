@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                PC Category
            </div>
            
            <div class="card-body">
                <form   method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')

                <div class="form-group">
                    <label for="">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control" value="{{ $pcItem -> item_name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="">Item Price</label>
                    <input type="text" name="item_price" id="item_price" class="form-control" value="{{ $pcItem -> item_price }}" readonly>
                </div>
                <div class="form-group">
                    <label for="sel1">Select PC Category:</label>
                    <input type="text" class="form-control" value="{{ $pcItem->PcCategory->cat_name}}" readonly>
                </div>  
                    
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush