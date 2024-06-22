@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">About Us</h2>
                <a href="/admin/story/create" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add New</a>
                <hr>
            </div>
        </div>
    </div>
    
    <div class="container pt-3">
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-white" style="background-color:#212529">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width:20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($story as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{!!$item->description!!}</td>
                    <td>
                        <a href="/admin/story/{{ $item->id }}" class="btn btn-sm btn-primary py-2 mr-2" style="height:32px"><i class="fas fa-eye"></i></a>
                        <a href="/admin/story/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                        <form action="/admin/story/{{ $item->id }}" method="post" class="d-inline">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-sm btn-danger py-2" style="height:32px"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach   
            </tbody>
        </table>
    </div>
</div>
@endsection