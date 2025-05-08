<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/resets.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <title>Register</title>
</head>
<body>
<div class="auth-page">
    <div class="form-wrapper">
        <h1>Register</h1>
        @include('response.errors')
        <form action="{{route('auth.register')}}" method="POST">
            @csrf
            {{--input for username--}}
            <div class="input-wrapper">
                <label for="user_name">Username</label>
                <input type="text" value="{{old('user_name', '')}}" name="user_name" id="user_name" placeholder="Username">
            </div>
            {{--input for display name (optional field)--}}
            <div class="input-wrapper">
                <label for="display_name">Display name <i>(optional)</i></label>
                <input type="text" value="{{old('display_name', '')}}" name="display_name" id="display_name" placeholder="Display name (optional)">
            </div>
            {{--input for email--}}
            <div class="input-wrapper">
                <label for="user_email">Email address</label>
                <input type="text" value="{{old('user_email', '')}}" name="user_email" id="user_email" placeholder="Email address">
            </div>
            {{--input for password--}}
            <div class="input-wrapper">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            {{--input for password confirmation--}}
            <div class="input-wrapper">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password confirmation">
            </div>
            <input title="Register" type="submit" value="Register" class="form-submit-button">
        </form>
        <a href="{{route('dashboard.login')}}" style="color: var(--red);">Login</a>
    </div>
</div>
</body>
</html>
