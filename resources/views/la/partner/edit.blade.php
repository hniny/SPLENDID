@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Partnership
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
                <form action="{{ route ('partnership.update',$data->id)}}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label for="">Partner Company Name</label>
                        <input type="text" name="partner_name" id="partner_name" class="form-control" value={{$data->partner_name}} required>
                    </div>
                
                    <div class="form-group">
                        <label for="">Partner Company Profile Link</label>
                        <input type="text" name="partner_link" id="partner_link" class="form-control" value={{$data->partner_link}} required>
                    </div>
                
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Select Profile Image</label><br>
                            <img src="{{ URL::to('/') }}/uploads/{{ $data->image }}" class="img-thumbnail" width="100" />
                            <input type="hidden" name="hidden_image" value="{{ $data->image }}" /><br>
                            <input type="file" name="image" class="form-control mt-2" id="image"/>
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

@endpush