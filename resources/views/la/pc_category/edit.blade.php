@extends('la.master')
@section('content')
<div id="content-wrapper">
    <div class="container d-flex justify-content-center pt-3">
        <div class="card" style="width:100%">
            <div class="card-header text-white" style="background-color:#212529">
                PC Category
            </div>
            
            <div class="card-body">
                <form action="/admin/pc_category/{{ $pcCategory->id }}"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')

                <div class="form-group">
                    <label for="">PC Category</label>
                    <input type="text" name="cat_name" id="cat_name" class="form-control" value="{{ $pcCategory -> cat_name }}" >
                </div>
                        
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush