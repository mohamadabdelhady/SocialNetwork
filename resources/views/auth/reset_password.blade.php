<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loginstyle.css') }}" rel="stylesheet">
</head>
<body>
<div class="notification">
    <ul>
        <p id="notification-message"></p>
    </ul>
</div>
<div class="container-fluid" style="background-color: #f1f7fc; min-height: 100vh;">

    <div class="login-photo ms-auto me-auto" style="max-width: 400px !important;">
        <div class="form-container">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{$request->route('token')}}">
                <div class="navbar-brand ms-auto me-auto" ></div>
                <div class="form-group">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail"  placeholder="Email" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="InputPassword" placeholder="Password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control  " id="InputConfirmPassword" placeholder="Confirm password" name="password_confirmation">
                </div>
                <div class="form-group mt-2"><button class="btn btn-block btn-log" type="submit">Update</button></div>
            </form>
        </div>
    </div>
</div>
@if(session('status'))
    <script type="text/javascript">
        document.getElementById('notification').style.display="block";
        document.getElementById("notification-message").innerHTML += "<li><i class='fas fa-exclamation-circle'></i>"+"{{ session('status') }}"+"</li>";
    </script>
@endif
</body>
</html>
