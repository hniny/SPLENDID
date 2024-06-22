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
                PC Item
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
                <form action="/admin/pc_item"  method="post" class="needs-validation" novalidate>
                    {{ csrf_field() }}

                    
                    <div class="form-group">
                        <label for="">Item Name</label>
                        <textarea name="item_name" class="form-control" placeholder="Enter Item Name" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Item Price</label>
                        <textarea name="item_price" class="form-control" placeholder="Enter Item Price" required></textarea>
                    </div>
                
                    <div class="form-group">
                        <label for="sel1">Select PC Category:</label>
                        <select class="form-control" id="sel1" name="pc_category_id">
                           <option value="">Select PC Category</option>
                           @foreach ($pcCategories as $key=>$pcCategory)
                        <option value="{{$key}}">{{$pcCategory}}</option> 
                           @endforeach
                        </select>
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