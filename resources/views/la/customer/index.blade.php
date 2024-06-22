@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">Customer</h2>
                <a href="/admin/customer/create" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add New</a>
                <hr>
            </div>
        </div>
    </div>
    
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-white" style="background-color:#212529">
                <tr>
                    <th style="width:12%;">Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Township</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Post Code</th>
                    <th style="width:15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{!! str_limit($item->email,20,'...') !!}</td>
                    <td>{{ $item->pcity<>null? $item->pcity->name:"~" }}</td>
                    <td>{{ $item->township }}</td>
                    <td>{!! str_limit($item->address,25,'...') !!}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->post_code }}</td>
                    <td>
                        <a href="/admin/customer/{{ $item->id }}" class="btn btn-sm btn-primary py-2 mr-2" style="height:32px"><i class="fas fa-eye"></i></a>
                        <a href="/admin/customer/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                        <form action="/admin/customer/{{ $item->id }}" method="post" class="d-inline">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-sm btn-danger py-2" onclick="return confirm('Are you sure?')" style="height:32px"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach   
            </tbody>
        </table>
        <div class="row justify-content-center">
       
                {{ $customer->links() }}
           
           </div>
        
        </div>
    </div>
</div>
@endsection
