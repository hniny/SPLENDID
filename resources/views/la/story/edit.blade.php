@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                About Us
            </div>
            <div class="card-body">
                <form action="/admin/story/{{ $story->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $story->title }}">
                    </div>
                    <div class="form-group">
                        <label>Descritipon:</label>
                        <textarea id="summernote" class="form-control" name="desp" cols="30" rows="5">{!! $story->description !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Update</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancle</a>
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