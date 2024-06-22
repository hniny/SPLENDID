@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Warranty Information
            </div>
            
            <div class="card-body">
          
         
                <form action="/admin/warrantyinfo/{{ $data->id }}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')
                  

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Select Profile Image</label><br>
                            <img src="{{ URL::to('/') }}/uploads/{{ $data->image }}" class="img-thumbnail" width="100" />
                            <input type="hidden" name="hidden_image" value="{{ $data->image }}" /><br>
                            <input type="file" name="image" class="form-control mt-2"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Parent Category :</label>
                        <select name="parent_id" class="form-control" id="parent_id">
                       
                      
                       @foreach ($categories as $category)
                       <option value="{{ $category->id }}"  
                        {{$category->id == $data->category_id ? 'selected' : null}}

                       >{{ $category->name }}</option>
                       @endforeach
                   </select>
                      
                    </div>
                    <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $data -> product_name }}" >
                </div>
                    <h4>Warranty Details</h4>
                    <div class="repeater">
                        <div class="text-right">
                            <a data-repeater-create type="button"   class="btn btn-sm btn-primary pull-right addNew"><i class="fa fa-plus-circle"></i>&nbsp; Add</a>
                        </div>
                        <div data-repeater-list="item_details">
                            @foreach ($detail as $item)
                                <div data-repeater-item>
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
                                        <div class="col-md-2 text-right" style="padding-top:0px;">
                                            <input data-repeater-delete type="button" value="Remove" class="btn btn-danger btn-sm"/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {},
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
            },
            isFirstItemUndeletable: true
        });
    });
</script>
@endpush