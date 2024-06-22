@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Error Q & A
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Question</label>
                    <input type="text" name="question" id="question" class="form-control" value="{{ $error -> question }}" readonly>
                </div>
            
            
                <div class="form-group">
                    <label for="">Answer</label>
                <input type="text" name="answer" id="answer" class="form-control" value="{{ $error -> answer}}" readonly>
                </div>
            
                <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancle</a>
            </div>
        </div>
    </div>
</div>
@endsection
