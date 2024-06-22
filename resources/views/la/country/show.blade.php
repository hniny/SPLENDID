@extends('la.master')

@section('content')

<div id="content-wrapper">

    <div class="container d-flex justify-content-center pt-3">

        <div class="card" style="width:100%">

            <div class="card-header text-white" style="background-color:#212529">

                Country

            </div>

            <div class="card-body">

                    <div class="form-group">

                        <label>Name:</label>

                        <input type="text" class="form-control" value="{{ $country->name }}" readonly>

                    </div>

                    <div class="form-group">

                        <label>Short Name:</label>

                        <input type="text" class="form-control" value="{{ $country->short_name }}" readonly>

                    </div>

                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

            </div>

        </div>

    </div>

</div>

@endsection

