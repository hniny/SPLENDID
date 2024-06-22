@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Game Update
            </div>
            <div class="card-body">
                <form action="/admin/gameupdates/{{ $data->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $data->title}}" id="title" class="form-control" placeholder="Enter Game Update Title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Game Resource</label>
                                <input type="text" name="game_resource" value="{{ $data->game_resource}}" id="game_resource" class="form-control" placeholder="Enter Game Resource" required>
                            </div>
                        </div><br>
                        <div class="form-group col-md-12">
                            <label>Image :</label><br>
                            <img src="{{asset('uploads/'.$data->image)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                        </div><br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Cover Image :</label>
                                <input type="file" name="image" class="form-control" id="image" style="padding-bottom:36px;">
                                <input type="hidden" name="oldimage" value="{{ $data->image }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Coming Soon</label>
                                @if ($data->soon == 1)
                                    <input type="checkbox" name="soon" id="soon" style="height:15px;float: left;" class="form-control" checked>
                                @else
                                    <input type="checkbox" name="soon" id="soon" style="height:15px;float: left;" class="form-control">
                                @endif
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Window Platform</label>
                                @if ($data->playform1 == 1)
                                    <input type="checkbox" name="window" id="" style="height:15px;float: left;" class="form-control" checked>
                                @else
                                    <input type="checkbox" name="window" id="" style="height:15px;float: left;" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Mac Platform</label>
                                @if ($data->playform2 == 1)
                                    <input type="checkbox" name="mac" id="" style="height:15px;float: left;" class="form-control" checked>
                                @else
                                    <input type="checkbox" name="mac" id="" style="height:15px;float: left;" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Play Station Platform</label>
                                @if ($data->playform3 == 1)
                                    <input type="checkbox" name="playstation" id="" style="height:15px;float: left;" class="form-control" checked>
                                @else 
                                    <input type="checkbox" name="playstation" id="" style="height:15px;float: left;" class="form-control">
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Genre ( Please separate each genre with comma )</label>
                                <input type="text" name="genre" id="genre" class="form-control" value="{{ $data->genre }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="description" class="form-control" value="{{ $data->description }}" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="id" value={{$data->id}}>
                    <button type="submit" class="btn btn-success float-right">Update</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>
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