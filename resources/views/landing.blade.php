<!DOCTYPE html><html lang='en' class=''>
<head>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{asset('css/landing.css')}}">
<title>Login Page</title>
</head>
<body><img class="img" src="{{asset('avatars/logo1.png')}}" style="width:10%;height:10%;margin-left:45%;margin-top:10%" alt="">
<div class="login">
    <p style="font-size:31px;margin-top:5%;">
        <b style="color:orange;">PT SUPER RESPATI JAKARTA</b>
    </p>


    <form method="post" action="{{ url('/login') }}">
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input type="text" name="email" class="form-control" required="required" placeholder="E-Mail" value="{{old('email')}}">
        </div>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-key"></i></div>
            </div>
            <input type="password" name="password" class="form-control" required="required" placeholder="Password">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary btn-block btn-medium w-50" style="float:left">Login</button>
        <a href="{{ url('/register') }}" class="btn btn-primary btn-medium w-50">Register</a>
    </form>


    @if ($errors->has('email'))
    <span class="help-block">
        <strong style="color:red">{{ $errors->first('email') }}</strong>
    </span>
    @endif
    @if ($errors->has('password'))
    <span class="help-block">
        <strong style="color:red">{{ $errors->first('password') }}</strong>
    </span>
    @endif
</div>

</body></html>