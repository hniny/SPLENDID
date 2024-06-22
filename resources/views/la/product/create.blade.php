@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Product
            </div>
            <div class="card-body">
                @if (isset($status))
                    <div class="alert alert-danger" id="mydiv">
                        <p>Access Fields အား ပြည့်စုံစွာ ဖြည့်ပါ...</p>
                    </div>
                @endif
                <form action="/admin/product" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Sorting Number</label>
                                <input type="text" name="sorting_no" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">New Arrival Item :</label>
                                <div class="form-check">
                                    <label class="form-check-label" style="width:100%;">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="radio" class="form-check-input ml-5" name="new_item" id="yes" value="1" required> Yes
                                            </div>
                                            
                                            <div class="col-md-11">
                                                <input type="radio" class="form-check-input ml-5" name="new_item" id="no" value="0">
                                                No
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Parent Category :</label>
                                <select name="parent_id" class="form-control" id="parent_id" required>
                                    <option value="">None</option>
                                    @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Category :</label>
                                <select name="child" class="form-control" id="child_id" required>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image">Image :</label>
                                <input type="file" name="image" class="form-control" id="image" style="padding-bottom:36px;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Name :</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Price :</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter price" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Rating :</label>
                                <select name="rating" id="rating" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3 form-group">
                       <input type="checkbox" name="promo" id="promo" onclick="promotion()">
                       <label for="">Promotion Item</label>
                    </div>
                    <div class="col-md-3 ">
                        <div class="form-check">
                            <label class="form-check-label">
                            
                              <input type="checkbox" class="form-check-input" name="hot_item" id="hot_item" value="1">
                              Hot Item
                            </label>
                          </div>
                     </div>
                    </div>

                    <div id="promoDiv" style="display: none;">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Gift This</label>
                                <input type="checkbox" name="gift_item" id="gift_item" class="form-control" onclick="giftitem()" style="width: 15px !important;">
                            </div>
                            <div class="col-md-3">
                                <label for="">Promotion Price</label>
                                <input type="text" name="promo_price" id="promo_price" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row" id="giftdiv" style="display: none;">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Gift Items :</label>
                                    <textarea id="summernote" class="form-control" name="sdesp" cols="30" rows="5" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="repeater">
                        <div class="text-left">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Accessories Fields</label>
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
                    <br>
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
    function promotion(){
        var x = document.getElementById("promoDiv");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function giftitem(){
        var y = document.getElementById("giftdiv");
        if (y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }

    setTimeout(function() {
        $('#mydiv').fadeOut('fast');
    }, 2000); 

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
                            $('#child_id').append('<option value='+value.id+'>'+value.name+'</option>');
                        });
                    }
                })
            }
        });
        
        $('#summernote').summernote({
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