@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
               Warranty Information
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
                <form action="/admin/warrantyinfo"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

            <div class="form-group">
                <label>Category Name:</label>
                <select name="parent_id" class="form-control" id="parent_id" required>
                    <option value="">None</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" required>
            </div>

            <div class="form-group">
                <label >Select Laptop Image</label>
                <div >
                    <input type="file" name="image" class="form-control"/>
                </div>
            </div>
            <div class="repeater">
                <div class="text-left">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Warranty Information Fields</label>
                        </div>
                        <div class="col-md-2">
                            <input data-repeater-create type="button" class="form-control" value="Add"/>
                        </div>
                    </div>
                </div><br>
                <div data-repeater-list="detail">
                    <div data-repeater-item>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input class="form-control" type="text" name="access_field" value=""/>
                            </div>
                            <div class="col-md-4 form-group">
                                <input class="form-control" type="text" name="access_value" value=""/>
                            </div>
                            <div class="col-md-2 form-group">
                                <input data-repeater-delete type="button" value="Delete"/>
                            </div>
                        </div>
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
        $('#parent_id').on('change', function(){
            $('#child_id').empty();
            var id = $(this).val();
            if(id){
                $.ajax({
                    type: 'get',
                    url: '/admin/get_category/'+id,
                    success: function(data){ 
                        console.log(data);
                        $.each(data.categories, function(index,value) {
                            console.log('value',value.id)
                            $('#child_id').append('<option value='+value.id+'>'+value.name+'</option>');
                        });
                    }
                })
            }
        });

    //jquery repeater
    $('.repeater').repeater({
            initEmpty: true,
            defaultValues: {},
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
            },
            isFirstItemUndeletable: false
        });

    });
</script>
@endpush