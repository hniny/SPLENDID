@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Product Content
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $data -> title }}" readonly>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Select Product Content Image</label><br>
                        <img src="{{asset('uploads/'.$data->content_image)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Product Content Description</label>
                    <div class="card p-3">
                        <label readonly>{!! $data->content_description !!}</label>
                    </div>
               
                </div>
            
                
                <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

                
            </div>
        </div>
    </div>
</div>
@endsection
