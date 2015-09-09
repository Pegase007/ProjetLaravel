@extends('layout_logout')

@section('content')

    <h1 class="form-header">Create your Account</h1>


    <!-- Form -->
    <form action="index.html" id="signup-form_id" class="panel">
        <div class="form-group">
            <input type="text" name="signup_name" id="name_id" class="form-control input-lg" placeholder="Name">
        </div>

        <div class="form-group">
            <input type="text" name="signup_email" id="email_id" class="form-control input-lg" placeholder="E-mail">
        </div>


        <div class="form-group">
            <input type="password" name="signup_password" id="password_id" class="form-control input-lg" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="confirmpassword" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm Password">
        </div>

        <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
            <label class="checkbox-inline">
                <input type="checkbox" name="signup_confirm" class="px" id="confirm_id">
                <span class="lbl">I agree with the <a href="#" target="_blank">Terms and Conditions</a></span>
            </label>
        </div>

        <div class="form-actions">
            <input type="submit" value="Create an account" class="btn btn-primary btn-lg btn-block">
        </div>
    </form>
    <!-- / Form -->


@endsection

