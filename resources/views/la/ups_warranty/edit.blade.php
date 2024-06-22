@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                UPS Warranty Information
            </div>
            
            <div class="card-body">
                <form action="/admin/ups_warranty/{{ $data->id }}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')

                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $data -> product_name }}" >
                </div>
            
                <div class="form-group">
                    <label for="">Service</label>
                <input type="text" name="service" id="service" class="form-control" value="{{ $data -> service}}" >
                </div>
            
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Select Profile Image</label><br>
                        <img src="{{ URL::to('/') }}/uploads/{{ $data->image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->image }}" /><br>
                        <input type="file" name="image" class="form-control mt-2"/>
                    </div>
                </div>
                        
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancle</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js/jquery.repeater.js')}}"></script>

@endpush