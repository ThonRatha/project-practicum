{{-- @extends('frontend.main_master')
@section('main')
<div class="sign-up-area">
    <div class="container">



                    <div class="contact-form">
                        <div class="section-title text-center">

                            <h2>SIGN UP</h2>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your Username" placeholder="Username">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control" required data-error="Please enter password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn btn-bg-three border-radius-5">
                                        Sign Up
                                    </button>
                                </div>

                                <div class="col-12">
                                    <p class="account-desc">
                                        Already have an account?
                                        <a href="{{ route('login') }}">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>



    </div>
</div>
@endsection --}}
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

	<title>Register Page</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Left Side: Sign In Form -->
                <div class="col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
                    <div class="card shadow-none bg-transparent rounded-0 mb-0">
                        <div class="card-body text-center">
                            <img src="{{ asset('frontend/assets/img/user_login.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <!-- Right Side: Image -->
                <div class="col-lg-6 col-xl-6">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <h2>SIGN UP</h2>
                            </div>
                            <form method="POST" action="{{ route('register') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="p mb-0">Email</div>
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control" required data-error="Please enter your Name or Email" placeholder="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p mb-0">Password</div>
                                        <div class="form-group" >
                                            <input class="form-control" id="password" type="password" name="password" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p mb-0">Confirm Password</div>
                                        <div class="form-group" >
                                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-6 form-condition">
                                        <div class="agree-label">
                                            <input type="checkbox" id="chb1">
                                            <label for="chb1">I agree to the terms of service and privacy</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center pt-10">
                                        <button type="submit" class="btn-login">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


