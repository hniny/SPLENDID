@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Video
            </div>
            <div class="card-body">
                <form action="/admin/video" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label>Youtube Link:</label>
                        <input type="text" class="form-control" name="link" placeholder="Enter link" required>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        
                        <input type="checkbox" class="form-check-input" name="top" id="top" value="on">
                        Top Page
                      </label>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection