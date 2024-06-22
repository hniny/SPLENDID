@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">UPS Warranty Information</h2>
                <a href="/admin/ups_warranty/create" class="btn btn-success float-right"><i class="fas fa-plus"></i>Add New</a>
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
    @if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
    @endif
    @if(session('info'))
    <div class="alert alert-info">
        {{session('info')}}
    </div>
    @endif
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-white" style="background-color:#212529">
                <tr>
                    <th>No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Service</th>
                    <th style="width:20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><img src="{{ URL::to('/') }}/uploads/{{ $item->image }}" class="img-thumbnail" width="75" /></td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->service }}</td>
                    <td>
                        <a href="/admin/ups_warranty/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>

                        

                        <form action="{{ route('ups_warranty.destroy', $item->id) }}" method="post" class="d-inline">
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
       
                {{ $data->links() }}
           
           </div>
        
        </div>
    </div>
</div>
@endsection
