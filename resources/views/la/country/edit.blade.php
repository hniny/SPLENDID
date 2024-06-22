@extends('la.master')

@section('content')

<div id="content-wrapper">

    <div class="container d-flex justify-content-center pt-3">

        <div class="card" style="width:100%">

            <div class="card-header text-white" style="background-color:#212529">

               Country

            </div>

            <div class="card-body">

                <form action="/admin/country/{{ $country->id }}" method="post">

                    {{ csrf_field() }}

                    {{ method_field('put') }}

                    <div class="form-group">

                        <label>Name:</label>

                        <input type="text" class="form-control" name="name" value="{{ $country->name }}">

                    </div>

                    <div class="form-group">

                        <label>Short Name:</label>

                        <input type="text" class="form-control" name="short_name" value="{{ $country->short_name }}">

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