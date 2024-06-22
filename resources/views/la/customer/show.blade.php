@extends('la.master')

@section('content')

<div id="content-wrapper">

    <div class="container d-flex justify-content-center pt-3">

        <div class="card" style="width:100%">

            <div class="card-header text-white" style="background-color:#212529">

                Customer

            </div>

            <div class="card-body">

                    <div class="form-group">

                        <label>Name:</label>

                        <input type="text" class="form-control" value="{{ $customer->name }}" readonly>

                    </div>

                    <div class="form-group">

                        <label>Email:</label>

                        <input type="text" class="form-control" value="{{ $customer->email }}" readonly>

                    </div>

                    <div class="form-group">

                        <label>City:</label>

                        <input type="text" class="form-control" name="title" value="{{ $customer->pcity->name }}" readonly>

                    </div>

                    <div class="form-group">

                        <label>Township:</label>

                        <input type="text" class="form-control" value="{{ $customer->township }}" readonly>

                    </div>

                    <div class="form-group">

                        <label>Address:</label>

                        <textarea  class="form-control" cols="30" rows="5" disabled> {{ $customer->address }} </textarea>

                    </div>

                    <div class="form-group">

                        <label>Phone:</label>

                        <input type="text" class="form-control" value="{{ $customer->phone }}" readonly>

                    </div>

                    <div class="form-group">

                        <label>Post Code:</label>

                        <input type="text" class="form-control" value="{{ $customer->post_code }}" readonly>

                    </div>

                    <a href="{{ URL::previous() }}" class="btn btn-danger float-right mr-2">Cancel</a>

            </div>

        </div>

    </div>

</div>

@endsection

