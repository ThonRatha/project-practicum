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

	<title>Login Page</title>
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
                                {{-- <span class="sp-color">Welcome!</span> --}}
                                <h2>SIGN IN</h2>
                            </div>
                            <form method="POST" action="{{ route('login') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="p mb-0">Email</div>
                                        <div class="form-group">
                                            <input type="text" name="login" id="login" class="form-control" required data-error="Please enter your Email" placeholder="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p mb-0">Password</div>
                                        <div class="form-group" >
                                            <input class="form-control" id="password" type="password" name="password" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 form-condition">
                                        <div class="agree-label">
                                            <input type="checkbox" id="chb1">
                                            <label for="chb1">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 text-end">
                                        <a class="forget" href="{{ route('password.request') }}">Forgot your password?</a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                            <button type="submit" class="btn-login">Sign In</button>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-center">
                                            <div class="account-desc">
                                                <p class="a">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                                            </p>
                                            </div>
                                        </div>
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

