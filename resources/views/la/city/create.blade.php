@extends('la.master')

@section('content')

<div id="content-wrapper">

    <div class="container d-flex justify-content-center pt-3">

        <div class="card" style="width:100%">

            <div class="card-header text-white" style="background-color:#212529">

                City

            </div>

            <div class="card-body">

                <form action="/admin/city" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">

                        <label>Name:</label>

                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>

                    </div>

                    <div class="form-group">

                        <label>Country:</label>

                        <select name="country_id" class="form-control">

                            @foreach ($country as $item)

                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @endforeach

                        </select>

                    </div>

                    <button type="submit" class="btn btn-success float-right">Save</button>

                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection