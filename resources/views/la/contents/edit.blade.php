@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Product Content
            </div>
            
            <div class="card-body">
                <form action="/admin/product_content/{{ $data->id }}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $data -> title }}" >
                </div>
            
                <div class="form-group">
                    <label for="">Product Content Description</label>
                    <textarea name="content_description" id="content_description" class="form-control" cols="30" rows="10">{{$data->content_description}}</textarea>
               
                </div>
            
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Select Product Content Image</label><br>
                        <img src="{{ URL::to('/') }}/uploads/{{ $data->content_image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->content_image }}" /><br>
                        <input type="file" name="content_image" class="form-control mt-2"/>
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
    $(document).ready(function() {
        $('#content_description').summernote({
        });
    });
</script>
@endpush