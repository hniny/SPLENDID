@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">Video</h2>
                <a href="/admin/video/create" class="btn btn-success float-right"><i class="fas fa-plus"></i>Add New</a>
                <hr>
            </div>
        </div>
    </div>
    
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-white" style="background-color:#212529">
                <tr>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Show Video</th>
                    <th style="width:20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->top=='on'?'yes':'no' }}</td>
                    <td>
                        <a href="/admin/video/{{ $item->id }}" class="btn btn-sm btn-primary py-2 mr-2" style="height:32px"><i class="fas fa-eye"></i></a>
                        <a href="/admin/video/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('video.destroy', $item->id) }}" method="post" class="d-inline">
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
