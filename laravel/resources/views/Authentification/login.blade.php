@extends('layout_logout')

@section('content')
</a> <!-- / .logo -->
<a href="{{ url('auth/register') }}" class="btn btn-primary ">Sign Up</a>
</div> <!-- / .header -->

<h1 class="form-header">Sign in to your Account</h1>


<!-- Form -->
<form action="" id="signin-form_id" class="panel" method="post">
    <div class="form-group">
        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email">
    </div> <!-- / Username -->

    <div class="form-group signin-password">
        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
        <a href="#" class="forgot">Forgot?</a>
    </div> <!-- / Password -->

    <div class="form-actions">
        <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg">
    </div> <!-- / .form-actions -->

    {{ csrf_field() }}
</form>
<!-- / Form -->

<div class="signin-with">
    <div class="header">or sign in with</div>
    <a href="index.html" class="btn btn-lg btn-facebook rounded"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
    <a href="index.html" class="btn btn-lg btn-info rounded"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;
    <a href="index.html" class="btn btn-lg btn-danger rounded"><i class="fa fa-google-plus"></i></a>
</div>

@endsection

