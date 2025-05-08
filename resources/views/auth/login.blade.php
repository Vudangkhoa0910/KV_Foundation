<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/resets.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="auth-page">
        <div class="form-wrapper">
            <h1>Login</h1>
            @include('response.errors')
            <form action="{{route('auth.login')}}" method="POST">
                @csrf
                {{--input for username/email--}}
                <div class="input-wrapper">
                    <label for="identifier">Username or Email</label>
                    <input type="text" value="{{old('identifier', '')}}" name="identifier" id="identifier" placeholder="Username or Email address">
                </div>
                {{--input for password--}}
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <input title="Login" type="submit" value="Login" class="form-submit-button">
            </form>
            <a href="{{route('dashboard.register')}}" style="color: var(--red);">Register</a>
        </div>
    </div>
</body>
</html>
