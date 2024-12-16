<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('frontend/assets/img/fav_icon.png') }}" type="image/png" />

	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
	<title>Admin Login Page</title>
</head>

<body>
	<!--wrapper-->
    <div class="row g-0">
        <div class="col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
            <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                <div class="card-body mt-5">
                        <img src="{{ asset('backend/assets/images/login-cover.png') }}" class="img-fluid auth-img-cover-login" width="500" alt=""/>
                </div>
            </div>

        </div>

        <div class="col-lg-5 col-xl-5">

                <div class="card-body p-sm-5">
                    <div class="">
                        <div class="mb-0 text-center mt-5">
                            <img src="{{ asset('frontend/assets/img/logos/logo.png') }}" width="250" alt="">
                        </div>
                        <div class="text-center mt-2">
                            <h3 class="sp-color">Welcome Admin!</h3>
                            <p class="mt-2">Please log into your account!</p>
                        </div>
                        <div class="form-body">

                            <form class="row g-3" method="POST" action="{{ route('login') }}">
                                    @csrf

                                <div class="col-12">
                                    <label for="login" class="form-label">Email</label>
                                    <input
                                        type="text"
                                        name="login"
                                        class="form-control @error('login') is-invalid @enderror"
                                        id="login"
                                        placeholder="ratha@gmail.com"
                                    >
                                    @error('login')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password" class="form-control border-end-0" id="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Sign In</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center ">
                                        <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

        </div>
    </div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
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
