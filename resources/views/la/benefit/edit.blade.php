@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Benefit
            </div>
            <div class="card-body">
                <form action="/admin/benefit/{{ $data->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Image 1 :</label><br>
                                <img src="{{asset('uploads/'.$data->card1)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Image 2 :</label><br>
                                <img src="{{asset('uploads/'.$data->card2)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="image">Image 1:</label>
                                <input type="file" name="card1" class="form-control" id="image" style="padding-bottom:36px;">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="image">Image 2:</label>
                                <input type="file" name="card2" class="form-control" id="card2" style="padding-bottom:36px;">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="oldimage1" value="{{ $data->card1 }}">
                    <input type="hidden" name="oldimage2" value="{{ $data->card2 }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea id="summernote" class="form-control" name="description" cols="30" rows="5" >{!! $data->description !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" value={{$data->id}}>
                    <button type="submit" class="btn btn-success float-right">Update</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endpush