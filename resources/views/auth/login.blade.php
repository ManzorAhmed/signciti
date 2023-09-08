@extends('theme.layouts.master')

<style>

    .auth_heading {

        font-size: 12px;

    }



    .auth_paragraph {

        font-size: 12px;

        line-height: 0.5;

    }



    .bg-orange {

        background-color: orange

    }

</style>

@section('content')

	<div class="container mt-4 mb-4">

		<div class="row align-items-center justify-content-center">

			<div class="col-md-6 border">

				<div class="form-block">

					<div class="text-center mb-5">

						 <h2 class="text-center pt-md-5 font-weight-bolder">Login or Create an Account</h2>

					</div>

					@csrf

					<form class="generalForm" id="loginform" method="POST" action="{{ route('login') }}">
                        @csrf

						<div class="form-group first">

							<label>

								Email Address

							</label>

							<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') }}" placeholder="Email Address" required>

							@error('email')

							<span class="invalid-feedback" role="alert">

										<strong>{{ $message }}</strong>

									</span>

							@enderror

						</div>

						<div class="form-group last mb-3">

							<label>

								Password

							</label>

							<input class="form-control @error('password') is-invalid @enderror" type="password"

								   name="password"

								   required="" placeholder="Password">

							@error('password')

							<span class="invalid-feedback" role="alert">

										<strong>{{ $message }}</strong>

									</span>

							@enderror

						</div>

						<div class="d-sm-flex mb-5 align-items-center">

							<label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>

								<input id="checkbox-signup" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} />

								<div class="control__indicator"></div>

							</label>

							<span class="ml-auto"><a href="{{ route('password.request') }}" class="text-dark pull-right"> <i class="fa fa-lock m-r-5"></i> Forgot Your Password?</a></a></span>

						</div>

							<input type="submit" value="Log In" class="btn btn-block bg-warning  text-white font-weight-bold">

						<div class="col-md-12 text-center p-3">

							<a href="{{ route('register') }}" class="text-warning text-center">Create your Account --></a>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    <div class="container-fluid bg-white d-none">

        <h2 class="text-center pt-md-5 font-weight-bolder">Login or Create an Account</h2>

        <div class="row">

            <div class="col-md-6 pb-md-5">

                <div class="text-center pt-md-5">

                    <h3 class="auth_heading">New Here?</h3>

                    <p class="auth_paragraph">Registration is free and easy!</p>

                    <p class="auth_paragraph">Faster checkout</p>

                    <p class="auth_paragraph">Save multiple shipping addresses</p>

                    <p class="auth_paragraph">View and track orders and more</p>

                    <a href="{{ route('register') }}" class="btn btn-warning btn-block">Create an Account</a>

                </div>

            </div>

            <div class="col-md-6">

                <div class="pt-md-5 pl-md-5">

                    <h3 class="auth_heading">Already registered?</h3>

                    <p class="auth_paragraph">If you have an account with us, please log in.</p>

                    <form class="generalForm" id="loginform" method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="form-group">

                            <label>

                                Email Address

                            </label>

                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') }}" placeholder="Email Address" required>

                            @error('email')

                            <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            <label>

                                Password

                            </label>

                            <input class="form-control @error('password') is-invalid @enderror" type="password"

                                   name="password"

                                   required="" placeholder="Password">

                            @error('password')

                            <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                            @enderror

                        </div>

                        <div class="form-group">

                            <div class="col-md-12">

                                <div class="checkbox checkbox-info pull-left p-t-0">

                                    <input id="checkbox-signup" name="remember"

                                           type="checkbox" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="checkbox-signup"> Remember me </label>

                                </div>

                                <a href="{{ route('password.request') }}" class="text-dark pull-right"> <i class="fa fa-lock m-r-5"></i> Forgot Your Password?</a>

                            </div>

                        </div>

                        <div class="form-group text-center m-t-20">

                            <div class="col-xs-12">

                                <button type="submit" class="btn btn-warning btn-block">

                                    Login

                                </button>

                            </div>

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
