@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">Category</h2>
                <a href="/admin/category/create" class="btn btn-success float-right"><i class="fas fa-plus"></i>Add New</a>
                <hr>
            </div>
        </div>
    </div>
    
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-white" style="background-color:#212529">
                <tr>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th style="width:20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->parent<>null?$item->parent->name:"None" }}</td>
                    <td>
                        <a href="/admin/category/{{ $item->id }}" class="btn btn-sm btn-primary py-2 mr-2" style="height:32px"><i class="fas fa-eye"></i></a>
                        <a href="/admin/category/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                        <form action="/admin/category/{{ $item->id }}" method="post" class="d-inline">
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
       
                {{ $category->links() }}
           
           </div>
        
        </div>
    </div>
</div>
@endsection
