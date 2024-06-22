@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Video
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                </div>
                <div class="form-group">
                    <label>Parent Category:</label>
                    <input type="text" class="form-control" name="link" id="link" value="{{ $data->link }}">
                </div>
                
                <div class="checkbox">
            
                
                <input type="checkbox" value="{{$data->top}}" {{$checked}} name="top" readonly><label>Top Page</label>
                 </div> 
                <input type="hidden" name="id" value={{$data->id}}>
                
                <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

                
            </div>
        </div>
    </div>
</div>
@endsection
