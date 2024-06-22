@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                Product
            </div>
            <div class="card-body">
                <form action="/admin/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Sorting No</label>
                                <input type="text" class="form-control" name="sorting_no" id="" value="{{$product->sorting_no}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Parent Category :</label>
                                <select name="parent_id" class="form-control" id="parent_id">
                                    <option value="{{ $product->category->id }}">{{ $product->category->parent->name }}</option>
                                    @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category :</label>
                                <select name="child" class="form-control" id="child_id">
                                    <option value="{{ $product->category->id }}">{{$product->category->name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name :</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->product_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price :</label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rating :</label>
                                <select name="rating" id="rating" class="form-control">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($product->rating == $i)
                                            <option value="{{$product->rating}}" selected>{{$product->rating}}</option>
                                        @else
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Image :</label><br>
                        {{-- <img src="../uploads/{{$product->product_img}}" class="img-thumbnail" width="200" height="200"> --}}
                        <img src="{{asset('uploads/'.$product->product_img)}}" alt="Splendid Myanmar" class="img-thumbnail" width="200" height="200"/>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image">Image :</label>
                                <input type="file" name="image" class="form-control" id="image" style="padding-bottom:36px;">
                                <input type="hidden" name="oldimage" value="{{ $product->product_img }}">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">New Arrival Item :</label>
                                <div class="form-check">
                                    <label class="form-check-label" style="width:100%;">
                                        <div class="row">
                                            <div class="col-md-1">
                                                @if ($product->new_item == 1 )
                                                <input type="radio" class="form-check-input ml-5" name="new_item" id="yes" value="1" checked> Yes 
                                                @else
                                                <input type="radio" class="form-check-input ml-5" name="new_item" id="yes" value="1"> Yes 
                                                @endif
                                            </div>
                                            
                                            <div class="col-md-11">
                                                @if ($product->new_item == 0 )
                                                <input type="radio" class="form-check-input ml-5" name="new_item" id="no" value="0" checked>
                                                No
                                                @else
                                                <input type="radio" class="form-check-input ml-5" name="new_item" id="no" value="0">
                                                No
                                                @endif
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    {{-- {{dd($product->hot_item)}} --}}
                    <div class="checkbox">
                        <label><input type="checkbox" value="{{$product->hot_item}}" {{$checked}} name="hot_item" >Hot Item</label>
                    </div>
                    @if ($product->promo == 'off')
                        <div class="form-group">
                            <input type="checkbox" name="promo" id="promo" onclick="promotion()">
                            <label for="">Promotion Item</label>
                        </div>

                        <div id="promoDiv" style="display: none;">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Gift This</label>
                                    <input type="checkbox" name="gift_item" id="gift_item" style="width: 15px !important;" class="form-control" onclick="giftitem()">
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
                    @else
                        <div class="form-group">
                            <input type="checkbox" name="promo" id="promo" onclick="promotion()" checked>
                            <label for="">Promotion Item</label>
                        </div>
                        

                        <div id="promoDiv">

                            @if ($product->gift_item == 'off')
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                            <label for="">Gift This</label>
                                            <input type="checkbox" name="gift_item" id="gift_item" class="form-control" onclick="giftitem()" style="width: 15px !important;">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Promotion Price</label>
                                        @if ($product->promo_price <> null)
                                            <input type="text" name="promo_price" id="promo_price" value="{{$product->promo_price}}" class="form-control">
                                        @else
                                            <input type="text" name="promo_price" id="promo_price" class="form-control">
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row" id="giftdiv" style="display: none">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Gift Items :</label>
                                            <textarea id="summernote" class="form-control" name="sdesp" cols="30" rows="5" >{{$product->short_description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                            <label for="">Gift This</label>
                                            <input type="checkbox" name="gift_item" id="gift_item" style="width: 15px !important;" class="form-control" onclick="giftitem()" checked>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Promotion Price</label>
                                        @if ($product->promo_price <> null)
                                            <input type="text" name="promo_price" id="promo_price" value="{{$product->promo_price}}" class="form-control">
                                        @else
                                            <input type="text" name="promo_price" id="promo_price" class="form-control">
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row" id="giftdiv">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Gift Items :</label>
                                            <textarea id="summernote" class="form-control" name="sdesp" cols="30" rows="5" >{{$product->short_description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    <br>
                    
                    <div class="repeater">
                        <div class="card">
                            <div class="card-header">
                                Accessories
                                <div class="text-right">
                                    <a data-repeater-create type="button"   class="btn btn-sm btn-primary pull-right addNew"><i class="fa fa-plus-circle"></i>&nbsp; Add</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div data-repeater-list="item_details">
                                    @if(isset($accitem) && count($accitem) != 0)
                                        @foreach ($accitem as $ac)
                                        {{-- {{dd($ac->item_name)}} --}}
                                            <div data-repeater-item>
                                                <div class="row">
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" name="item_name" id="" value="{{$ac['item_name']}}" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="text" name="item_value" id="" value="{{$ac['item_value']}}" class="form-control">
                                                    </div>
                                                    <div class="col-md-1 text-right" style="padding-top:0px;">
                                                        <input data-repeater-delete type="button" value="Remove" class="btn btn-danger btn-sm"/>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <input class="form-control" type="text" name="item_name" value=""/>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input class="form-control" type="text" name="item_value" value=""/>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <input data-repeater-delete type="button" value="Delete"/>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
<br>
                    <button type="submit" class="btn btn-success float-right">Update</button>
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
        
        $('#summernote').summernote();

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