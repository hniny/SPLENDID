@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                PC Category
            </div>
            
            <div class="card-body">
                <form action="/admin/pc_item/{{ $pcItem->id }}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')

                <div class="form-group">
                    <label for="">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control" value="{{ $pcItem -> item_name }}" >
                </div>

                <div class="form-group">
                    <label for="">Item Price</label>
                    <input type="text" name="item_price" id="item_price" class="form-control" value="{{ $pcItem -> item_price }}" >
                </div>
                <div class="form-group">
                    <label for="sel1">Select PC Category:</label>
                    <select class="form-control" id="sel1" name="pc_category_id">
                       
                       @foreach ($pcCategories as $key=>$pcCategory)
                       
                        @if ($key == $pcItem->pc_category_id)
                        
                        <option value="{{$key}}" selected>{{$pcCategory}}</option> 
                        @else
                        <option value="{{$key}}">{{$pcCategory}}</option> 
                        @endif
                  
                            
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
@push('scripts')

@endpush