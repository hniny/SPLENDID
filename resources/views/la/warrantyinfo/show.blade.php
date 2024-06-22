@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Warranty Information
            </div>
            <div class="card-body">
               
                    <div class="form-group">
                        <label for="image">Image :</label><br>
                        <img src="{{asset('uploads/'.$data->image)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                    </div>
               
               <div class="form-group">
                    <label>Product Name</label>
                   
                    <input type="text" value="{{$data->product_name}}" class="form-control">
                  
                </div> 
                
                <h4>Warranty Details</h4>
                    @foreach ($detail as $item)
                        
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" name="warrantydetail_name" value="{{$item->warrantydetail_name}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" name="warrantydetail_value" value="{{$item->warrantydetail_value}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            
                        </div>
                        
                    @endforeach
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>
                    </div>
                  </div>
                </div>
              </div>

                
            
                

                   
            
@endsection

