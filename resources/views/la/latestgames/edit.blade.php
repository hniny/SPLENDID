@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                latest Games
            </div>
            <div class="card-body">
            <form action="{{ route ('latestgames.update',$data->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="product_name" id="product_name" value="{{$data->product_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="desp" id="desp" class="form-control" value={{$data->desp}}>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" id="price" class="form-control" value={{$data->price}}>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image :</label>
                                <img src="{{asset('uploads/'.$data->product_image)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Background Image</label>
                                <img src="{{asset('uploads/'.$data->bg_image)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image :</label>
                                <input type="file" name="product_image" class="form-control" id="product_image" style="padding-bottom:36px;">
                                <input type="hidden" name="old_p_image" value="{{ $data->product_image }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Background Image</label>
                                <input type="file" name="bg_image" id="bg_image" class="form-control">
                                <input type="hidden" name="old_bg_image" value="{{ $data->bg_image }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 1</label>
                                <input type="text" name="spec1" value="{{$data->spec1}}" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 1Description</label>
                                <textarea name="spec1_desp" id="spec1_desp" class="form-control" cols="30" rows="10">{{$data->spec1_desp}}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 2</label>
                                <input type="text" name="spec2" value="{{$data->spec2}}" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 2 Description</label>
                                <textarea name="spec2_desp" id="spec2_desp" class="form-control" cols="30" rows="10">{{$data->spec2_desp}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 3</label>
                                <input type="text" name="spec3" value="{{$data->spec3}}" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 3 Description</label>
                                <textarea name="spec3_desp" id="spec3_desp" class="form-control" cols="30" rows="10">{{$data->spec3_desp}}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 4</label>
                                <input type="text" name="spec4" value="{{$data->spec4}}" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 4 Description</label>
                                <textarea name="spec4_desp" id="spec4_desp" class="form-control" cols="30" rows="10">{{$data->spec4_desp}}</textarea>
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