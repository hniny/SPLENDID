@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container">
        @extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                PC Category
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
                <form action="/admin/pc_category"  method="post" >
                    {{ csrf_field() }}

                    
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <textarea name="cat_name" class="form-control" placeholder="Enter Category Name"></textarea>
                    </div>
                
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

    </div>
</div> 
@endsection