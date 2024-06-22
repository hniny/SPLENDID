@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Partnership
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Partner Company Name</label>
                    <input type="text"  class="form-control" value={{$partner->partner_name}} readonly>
                </div>
            
                <div class="form-group">
                    <label for="">Partner Company Profile Link</label>
                    <input type="text"  class="form-control" value={{$partner->partner_link}} readonly>
                </div>
            
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Select Profile Image</label><br>
                        <img src="{{ URL::to('/') }}/uploads/{{ $partner->image }}" class="img-thumbnail" width="100" />
                        
                    </div>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

                
            </div>
        </div>
    </div>
</div>
@endsection
