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
                                <span class="sp-color">Welcome!</span>
                                <h2>Sign In to Your Account!</h2>
                            </div>

                            <form method="POST" action="{{ route('login') }}" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" name="login" id="login" class="form-control" required data-error="Please enter your Username or Email" placeholder="Email or Phone">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" >
                                            <input class="form-control" id="password" type="password" name="password" placeholder="Password">

                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-6 form-condition">
                                        <div class="agree-label">
                                            <input type="checkbox" id="chb1">
                                            <label for="chb1">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 text-end">
                                        <a class="forget" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                            <button type="submit" class=" large-p default-btn btn-bg-login border-radius-5">Sign In Now</button>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-center">
                                            <div class="account-desc">
                                                <p class="{{ route('register') }}">Don't have an account? <a href="sign-up.html">Sign Up</a></p>
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

	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>

