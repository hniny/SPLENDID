@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">Warranty Information</h2>
                <a href="/admin/warrantyinfo/create" class="btn btn-success float-right"><i class="fas fa-plus"></i>Add New</a>
                <hr>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-white" style="background-color:#212529">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            
                            <th>Product Name</th>
                            {{-- @foreach ($data as $item)
                                <th>{{ $item->warrantydetail_name}}</th> 
                            @endforeach --}}
                          
                         
                            <th style="width:14%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warranty as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td><img src="{{ URL::to('/') }}/uploads/{{ $item->image }}" class="img-thumbnail" width="75" /></td>
                               
                            <td>{{ $item->product_name }}</td>
                            {{-- @foreach ($data as $item)
                                <td>{{ $item->warrantydetail_value}}</th> 
                            @endforeach --}}
                           
                            
                            <td>
                                <a href="/admin/warrantyinfo/{{ $item->id }}" class="btn btn-sm btn-primary py-2 mr-2" style="height:32px"><i class="fas fa-eye"></i></a>
                                <a href="/admin/warrantyinfo/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('warrantyinfo.destroy', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger py-2" onclick="return confirm('Are you sure?')" style="height:32px"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            
            {{ $warranty->links() }}
            
        </div>
    </div>
</div>
@endsection
