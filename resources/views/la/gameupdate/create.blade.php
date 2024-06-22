@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Game Update
            </div>
            <div class="card-body">
                <form action="/admin/gameupdates" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Game Update Title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Game Resource</label>
                                <input type="text" name="game_resource" id="game_resource" class="form-control" placeholder="Enter Game Resource" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Cover Image :</label>
                                <input type="file" name="image" class="form-control" id="image" style="padding-bottom:36px;">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Coming Soon</label>
                                <input type="checkbox" name="soon" id="soon" style="height:15px;float: left;" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Window Platform</label>
                                <input type="checkbox" name="window" id="" style="height:15px;float: left;" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Mac Platform</label>
                                <input type="checkbox" name="mac" id="" style="height:15px;float: left;" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Play Station Platform</label>
                                <input type="checkbox" name="playstation" id="" style="height:15px;float: left;" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Genre ( Please separate each genre with comma )</label>
                                <input type="text" name="genre" id="genre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>

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
        $('#description').summernote({
        });
    });
</script>
@endpush