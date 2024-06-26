@extends('layouts.app')

@section('content')

<div class="splendid container" style="padding: 8.7rem 0rem">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger text-white" style="background-color: #1A1B1C">
                {{-- <div class="card-header">{{ __('Admin Login') }}</div> --}}
                <div class="card-header">
                    <a class="navbar-brand">
                        <img src="/images/BG_(Red).png" width="80px" alt="logo" class="logo" style="
                            background: #E91D24;
                            border-radius: 50%;
                            padding: 10px;
                            margin-left:20rem;
                            width: 90px;
                        " />									
                    </a>
                </div>
                <hr style="border-top: #E91D24 1px solid">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus style="background-color: #1A1B1C;border-color:#E91D24">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required style="background-color: #1A1B1C;border-color:#E91D24">

                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style=" background: #E91D24; margin-left:17.5rem">
                                    {{ __('Login') }}
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
