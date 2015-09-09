@extends('layout_logout')

@section('content')

<h1 class="form-header">Sign in to your Account</h1>


<!-- Form -->
<form action="index.html" id="signin-form_id" class="panel">
    <div class="form-group">
        <input type="text" name="signin_username" id="username_id" class="form-control input-lg" placeholder="Username or email">
    </div> <!-- / Username -->

    <div class="form-group signin-password">
        <input type="password" name="signin_password" id="password_id" class="form-control input-lg" placeholder="Password">
        <a href="#" class="forgot">Forgot?</a>
    </div> <!-- / Password -->

    <div class="form-actions">
        <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg">
    </div> <!-- / .form-actions -->
</form>
<!-- / Form -->

<div class="signin-with">
    <div class="header">or sign in with</div>
    <a href="index.html" class="btn btn-lg btn-facebook rounded"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
    <a href="index.html" class="btn btn-lg btn-info rounded"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;
    <a href="index.html" class="btn btn-lg btn-danger rounded"><i class="fa fa-google-plus"></i></a>
</div>

@endsection

