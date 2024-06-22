@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Error Question & Answer
            </div>
            
            <div class="card-body">
                <form action="/admin/error_qa/{{ $data->id }}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')

                <div class="form-group">
                    <label for="">Question</label>
                    <input type="text" name="question" id="question" class="form-control" value="{{ $data -> question }}" >
                </div>
            
            
                <div class="form-group">
                    <label for="">Answer</label>
                <input type="text" name="answer" id="answer" class="form-control" value="{{ $data -> answer}}" >
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
        $('#spec1_desp').summernote({
        });
        $('#spec2_desp').summernote({
        });
        $('#spec3_desp').summernote({
        });
        $('#spec4_desp').summernote({
        });
    });
</script>
@endpush