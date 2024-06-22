@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">PC Items</h2>
                <a href="/admin/pc_item/create" class="btn btn-success float-right"><i class="fas fa-plus"></i>Add New</a>
                <hr>
            </div>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(session('delete'))
    <div class="alert alert-success">
        {{session('delete')}}
    </div>
    @endif
    
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-white" style="background-color:#212529">
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>PC Category</th>
                    
                    <th style="width:20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pcItems as $key=>$item)
                <tr>
                    <td>{{ ++$key }}</td>
                   
                    <td>{{ $item->item_name}}</td>
                    <td>${{ $item->item_price}}</td>
                    <td>{{ $item->PcCategory->cat_name}}</td>
                  
                   
                    <td>
                        <a href="/admin/pc_item/{{ $item->id }}" class="btn btn-sm btn-primary py-2 mr-2" style="height:32px"><i class="fas fa-eye"></i></a>
                        <a href="/admin/pc_item/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('pc_item.destroy', $item->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger py-2" onclick="return confirm('Are you sure?')" style="height:32px"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach   
            </tbody>
        </table>
        <div class="row justify-content-center">
       
                {{ $pcItems->links() }}
           </div>
        
        </div>
    </div>
</div>
@endsection