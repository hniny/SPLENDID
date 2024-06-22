@extends('la.master')

@section('content')

<div id="content-wrapper">

    <div class="container d-flex justify-content-center pt-3">

        <div class="card" style="width:100%">

            <div class="card-header text-white" style="background-color:#212529">

                Customer

            </div>

            <div class="card-body">

                <form action="/admin/customer" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">

                        <label>Name:</label>

                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>

                    </div>

                    <div class="form-group">

                        <label>Email:</label>

                        <input type="text" class="form-control" name="email" placeholder="Enter Email" required>

                    </div>

                    <div class="form-group">

                        <label>City:</label>

                        <select id="inputState" name="city_id" class="form-control">

                            @foreach ($country as $item)

                            @if (count($item->cityname)>0)

                                @foreach ($item->cityname as $city)

                                <option value="{{ $city->id }}">{{ $city->name }}</option>

                                @endforeach

                            @endif

                            @endforeach

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Township:</label>

                        <input type="text" class="form-control" name="township" placeholder="Enter township" required>

                    </div>

                    <div class="form-group">

                        <label>Address:</label>

                        <textarea  class="form-control" name="address" cols="30" rows="5"></textarea>

                    </div>

                    <div class="form-group">

                        <label>Phone:</label>

                        <input type="text" class="form-control" name="phone" placeholder="Enter phone" required>

                    </div>

                    <div class="form-group">

                        <label>Post Code:</label>

                        <input type="number" class="form-control" name="post_code" required>

                    </div>

                    <button type="submit" class="btn btn-success float-right">Save</button>

                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection