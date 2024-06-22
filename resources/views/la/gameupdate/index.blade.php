@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <h2 class="d-inline">Game Update</h2>
                <a href="/admin/gameupdates/create" class="btn btn-success float-right"><i class="fas fa-plus"></i>Add New</a>
                <hr>
            </div>
        </div>
    </div>
    
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="text-white" style="background-color:#212529">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Resource</th>
                    <th>Soon</th>
                    <th>Genre</th>
                    <th style="width:20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->game_resource }}</td>
                    <td>
                        @if ($item->soon == 1)
                            <i class="far fa-check-circle"></i>
                        @else
                            <i class="far fa-times-circle"></i>
                        @endif
                    </td>
                    <td>{{ $item->genre }}</td>
                    <td>
                        <a href="/admin/gameupdates/{{ $item->id }}/edit" class="btn btn-sm btn-warning py-2 mr-2" style="height:32px"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('gameupdates.destroy', $item->id) }}" method="post" class="d-inline">
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
