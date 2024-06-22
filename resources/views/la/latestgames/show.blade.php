@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Lastest Games
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text"  value="{{$data->product_name}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text"  class="form-control" value={{$data->desp}} readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" value={{$data->price}}>
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
                            <label for="">Specification 1</label>
                            <input type="text"  value="{{$data->spec1}}"  class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="">Spec 1 Description</label><br>
                                <div class="card p-3">
                                    <label readonly>{!! $data->spec1_desp !!}</label>
                                </div>
                            </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Specification 2</label>
                            <input type="text" value="{{$data->spec2}}"  class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Spec 2 Description</label>
                            <div class="card p-3">
                                <label readonly>{!! $data->spec2_desp !!}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Specification 3</label>
                            <input type="text"  value="{{$data->spec3}}"  class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Spec 3 Description</label>
                            <div class="card p-3">
                                <label readonly>{!! $data->spec3_desp !!}</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Specification 4</label>
                            <input type="text"  value="{{$data->spec4}}"  class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Spec 4 Description</label>
                            <div class="card p-3">
                                <label readonly>{!! $data->spec4_desp !!}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value={{$data->id}}>
            
                <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

                   
            </div>
        </div>
    </div>
</div>
@endsection

