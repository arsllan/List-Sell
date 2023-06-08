
<!doctype html>
<html lang="en">
<head>
    <title>List and Sell</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="{{asset('public/login/images/favicon.ico')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/theme-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/theme-responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/font-awesome.min.css')}}">
</head>
<body>
    <!-- ================================start header============================== -->
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form">
                    <form class="validate-form" action="{{ route('check-admin-login') }}" method="POST">
                        @csrf
                        <div class="login-logo m-b-50"><a href="{{ route('homepage') }}"><img class="img-fluid" width="250" src="{{asset('public/login/images/logo.svg')}}"></a></div>
                        @if(Session::has('errors'))
                        <div class="alert alert-danger">
                            {{ Session::get('errors') }}
                        </div>                        
                        @endif
                        <h5>Admin Login</h5>
                        <div class="wrap-input100 validate-input m-t-20" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" placeholder="Email..." type="email" autocomplete="off" id="email" name="email">
							<span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" id="password" placeholder="Password..." name="password">
							<span class="focus-input100"></span>
                        </div>
                        <div class="flex-sb-m w-full p-t-15 p-b-15 row container-login100-form-btn">
							<div class="contact100-form-checkbox col-sm-6">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">Remember me</label>
							</div>
							<div class="col-sm-6 text-right"><a class="text" href="#!">Forgot password</a></div>
                        </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" id="submit" class="login100-form-btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('public/login/js/jquery.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('public/login/js/bootstrap.bundle.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('public/login/js/main.js')}}"></script>
</body>
 
</html>