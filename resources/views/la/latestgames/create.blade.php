@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Latest Game
            </div>
            <div class="card-body">
                <form action="/admin/latestgames" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="desp" id="desp" class="form-control" placeholder="Enter desp..." required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Enter price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image :</label>
                                <input type="file" name="product_image" class="form-control" id="product_image" style="padding-bottom:36px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Background Image</label>
                                <input type="file" name="bg_image" id="bg_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 1</label>
                                <input type="text" name="spec1" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 1Description</label>
                                <textarea name="spec1_desp" id="spec1_desp" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 2</label>
                                <input type="text" name="spec2" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 2 Description</label>
                                <textarea name="spec2_desp" id="spec2_desp" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 3</label>
                                <input type="text" name="spec3" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 3 Description</label>
                                <textarea name="spec3_desp" id="spec3_desp" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Specification 4</label>
                                <input type="text" name="spec4" id="spec1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Spec 4 Description</label>
                                <textarea name="spec4_desp" id="spec4_desp" class="form-control" cols="30" rows="10"></textarea>
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