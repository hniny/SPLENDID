@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Benefit
            </div>
            <div class="card-body">
                <form action="/admin/benefit" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">title :</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Image1 :</label>
                                <input type="file" name="card1" class="form-control" id="image" style="padding-bottom:36px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Image2 :</label>
                                <input type="file" name="card2" class="form-control" id="image" style="padding-bottom:36px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea id="summernote" class="form-control" name="description" cols="30" rows="5" ></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
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
        
        $('#summernote').summernote({
        });

    });

</script>
@endpush