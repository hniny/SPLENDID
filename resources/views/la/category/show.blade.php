@extends('la.master')

@section('content')

<div id="content-wrapper">

    <div class="container d-flex justify-content-center pt-3">

        <div class="card" style="width:100%">

            <div class="card-header text-white" style="background-color:#212529">

                Category

            </div>

            <div class="card-body">

                    <div class="form-group">

                        <label>Name:</label>

                        <input type="text" class="form-control" value="{{ $category->name }}" readonly>

                    </div>

                    <div class="form-group">

                        <label>Parent Category:</label>

                        <input type="text" class="form-control" name="title" value="{{ $category->parent<>null?$category->parent->name:"None" }}" readonly>

                    </div>

                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

            </div>

        </div>

    </div>

</div>

@endsection

