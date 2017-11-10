<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>

    <!-- CSS -->
    @include('partials.stylesheet')
</head>
<body>
    <div class="login-content">
        <div class="lc-block lc-block-alt toggled">
            <div class="lcb-form">
                <img class="lcb-user" src="{{ asset('img/logo.png') }}" alt="">

                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="fg-line">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username">
                        </div>
                        <span class="zmdi zmdi-account-circle form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="fg-line">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <span class="zmdi zmdi-lock form-control-feedback"></span>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <i class="input-helper"></i> Keep me signed in
                        </label>
                    </div>

                    <button type="submit" class="btn btn-login btn-primary btn-float"><i class="zmdi zmdi-sign-in"></i></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
        <div class="ie-warning">
            <h1 class="c-white">Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="img/browsers/chrome.png" alt="">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="img/browsers/firefox.png" alt="">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="img/browsers/safari.png" alt="">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                            <div>IE (New)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->

    <!-- Javascript Libraries -->
    @include('partials.javascript')

</body>
</html>
