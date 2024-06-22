@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Error Question & Answer
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
                <form action="/admin/error_qa"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    
                    <div class="form-group">
                        <label for="">Question</label>
                        <textarea name="question" class="form-control" placeholder="Enter Question"></textarea>
                    </div>
                
                
                    <div class="form-group">
                        <label for="">Answer</label>
                        <textarea name="answer" class="form-control" placeholder="Enter Answer"></textarea>
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

@endpush