@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Product Content
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
                <form action="/admin/product_content"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                    </div>
                
                    <div class="form-group">
                        <label for="">Content Description</label>
                        <textarea name="content_description" id="content_description" class="form-control" cols="30" rows="10" placeholder="Enter Content Description"></textarea>
                       
                    </div>
                
                    <div class="form-group">
                        <label >Select Product Content Image</label>
                        <div >
                            <input type="file" name="content_image" class="form-control"/>
                        </div>
                    </div>
                        
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js/jquery.repeater.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#content_description').summernote({
        });
    });
</script>

@endpush