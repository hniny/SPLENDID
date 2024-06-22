@extends('la.master')

@section('content')

<div id="content-wrapper">

    <div class="container d-flex justify-content-center pt-3">

        <div class="card" style="width:100%">

            <div class="card-header text-white" style="background-color:#212529">

                Category

            </div>

            <div class="card-body">

                <form action="/admin/category/{{ $category->id }}" method="post">

                    {{ csrf_field() }}

                    {{ method_field('put') }}

                    <div class="form-group">

                        <label>Name:</label>

                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">

                    </div>

                    <div class="form-group">

                        <label>Parent Category:</label>

                        <select name="parent_id" class="form-control">

                            @if ($category->parent<>null)

                            <option value="{{ $category->parent->id }}">{{ $category->parent->name }}</option>  

                            @else

                            <option value="0">None</option>

                            @endif

                            <option value="0">None</option>

                            @foreach ($categories as $item)

                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @endforeach

                        </select>

                    </div>

                    <button type="submit" class="btn btn-success float-right">Update</button>

                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

    $(document).ready(function() {

        $('#summernote').summernote();

    });

</script>

@endpush