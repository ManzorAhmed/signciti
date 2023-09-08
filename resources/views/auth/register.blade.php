@extends('theme.layouts.master')
<style>
    .auth_heading {
        font-size: 12px;
    }

    .auth_paragraph {
        font-size: 12px;
        line-height: 0.5;
    }
</style>
@section('content')
    <div class="container bg-white border mt-4  mb-4 border">
        <h2 class="text-center pt-md-5 font-weight-bolder">Create an Account</h2> 
        <div class="row">
            <div class="col-md-12">
                <div class="pt-md-5 pl-md-5">
                    <p class="auth_paragraph">
                        Please enter the following information to create your account.
                    </p>
                    <h4 class="">Already registered?</h4>
                    <p class="auth_paragraph">If you have an account with us, please log in.</p>
                    <form class="generalForm" id="signup-form" method="POST" action="{{ route('register')}}">
                        @csrf
                        <div class="form-group">
                            <label> Name </label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                                   placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                   value="{{ old('email') }}" placeholder="Email" required autocomplete="email" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>
                               Confirm Password
                            </label>
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">                        </div>
                        <div class="form-group">
                            <a href="{{route('login')}}" class="btn btn-default bg-danger text-white">
                                Back
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                Sign Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('.white-box').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>
@endsection
