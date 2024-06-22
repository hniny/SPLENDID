@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-4">
                <h2>Product</h2>               
            </div>
            <div class="col-md-6">
                <form action="/admin/productsearch" method="post" class="form-inline float-right">
                    {{ csrf_field() }}
                    <select name="catname" id="" class="form-control">
                        <option value="0">--ALL--</option>
                        @foreach ($cat as $item)
                            @foreach($sub_category as $k=>$i)
                                @if($item->id == $i['id'])
                                 </optgroup><optgroup label="{{$item->name}}">
                                    @foreach ($i as $key=>$value)
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-2">
                <a href="/admin/product/create" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>
        <hr>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover table-sm" style="font-size:10pt;">
                    <thead class="text-white" style="background-color:#212529">
                        <tr>
                            <th>Sorting No</th>
                            <th>Parent Category</th>
                            <th>Category</th>
                            <th style="width:14%;">Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th style="width:5%;">Rating</th>
                            <th style="width:10%;">New Item</th>
                            <th style="width:10%;">Hot Item</th>
                            <th style="width:17%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsearch as $item)
                        <tr>
                            <td>{{$item->sorting_no}}</td>
                            <td>{{ $item->category->parent<>null?$item->category->parent->name:"None" }}</td>
                            <td>{{ $item->category->name }}</td> 
                            <td>{{ $item->product_img }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->rating }}</td>
                            <td >
                                @if ($item->new_item == 1 )
                                <label class="font-weight-bold btn-sm btn-light text-secondary active text-center" style="width:100%;">
                                    Yes
                                </label>
                                @else
                                <label class="font-weight-bold btn-sm btn-light text-danger active text-center" style="width:100%;">
                                    No
                                </label>
                                @endif
                            </td>
                            <td >
                                @if ($item->hot_item == 1 )
                                <label class="font-weight-bold btn-sm btn-light text-secondary active text-center" style="width:100%;">
                                    Yes
                                </label>
                                @else
                                <label class="font-weight-bold btn-sm btn-light text-danger active text-center" style="width:100%;">
                                    No
                                </label>
                                @endif
                            </td>
                            <td>
                                <a href="/admin/product/{{ $item->id }}" class="btn btn-sm btn-primary py-2 mr-2" style="height:32px"><i class="fas fa-eye"></i></a>
                                <a href="/admin/product/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                                <form action="/admin/product/{{ $item->id }}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-sm btn-danger py-2" style="height:32px" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
