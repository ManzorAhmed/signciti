@extends('theme.layouts.master')

@section('content')
    <div class="container bg-white border">
        <h3 class="pt-md-5 text-center">Reset Password</h3>

        <form class="generalForm" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <div class="col-xs-12">
                    <label>Email</label>
                    <input id="email" type="email" placeholder="Email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <label>Password</label>
                    <input id="password" type="password" placeholder="Password"
                           class="form-control @error ('password') is-invalid @enderror" name="password" required
                           autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <label>Confirm Password</label>
                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control"
                           name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-warning btn-lg btn-block text-uppercase waves-effect waves-light"
                            type="submit">{{ __('Reset Password') }}</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('.white-box').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>
@endsection
