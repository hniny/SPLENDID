@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                About Us
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $story->title }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Descritipon:</label>
                        <textarea class="form-control" readonly>{!! strip_tags($story->description) !!}</textarea>
                    </div>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancle</a>
            </div>
        </div>
    </div>
</div>
@endsection
