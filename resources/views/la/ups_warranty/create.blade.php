@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                UPS Warranty Information
            </div>
            @if($errors->any())      
            <div class="alert alert-warning">
                <ol>          
                    @foreach($errors->all() as $error)            
                    <li>{{ $error }}</li>          
                    @endforeach        
                </ol>      
            </div>    
            @endif 
            <div class="card-body">
                <form action="/admin/ups_warranty"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" required>
                    </div>
                
                    <div class="form-group">
                        <label for="">Service</label>
                        <input type="text" name="service" id="service" class="form-control" placeholder="Enter service" required>
                    </div>
                
                    <div class="form-group">
                        <label >Select UPS Image</label>
                        <div >
                            <input type="file" name="image" class="form-control"/>
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