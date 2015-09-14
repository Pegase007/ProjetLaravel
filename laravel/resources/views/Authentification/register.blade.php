@extends('layout_logout')

@section('content')
</a> <!-- / .logo -->
<a href="{{ url('auth/login') }}" class="btn btn-primary ">Sign In</a>
</div> <!-- / .header -->

    <h1 class="form-header">Create your Account</h1>

    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
        @endif

    <!-- Form -->
    <form action="" method="post"  class="panel">
        {{csrf_field()}}



        <div class="form-group">
            <input type="text" name="prenom" id="prenom" class="form-control input-lg"  value="{{ Input::old('prenom') }}" placeholder="Prenom">
            @if ($errors->has('prenom')) <p class="help-block text-danger">{{$errors->first('prenom')}}</p>@endif

        </div>


        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control input-lg"  value="{{ Input::old('name') }}" placeholder="Name">
            @if ($errors->has('name')) <p class="help-block text-danger">{{$errors->first('name')}}</p>@endif

        </div>

        <div class="form-group">
            <input type="text" name="photo" id="photo" class="form-control input-lg"  value="{{ Input::old('photo') }}" placeholder="http://">
            @if ($errors->has('photo')) <p class="help-block text-danger">{{$errors->first('photo')}}</p>@endif

        </div>

        <div class="form-group">
            <input type="text" name="ville" id="ville" class="form-control input-lg"  value="{{ Input::old('ville') }}" placeholder="Ville">
            @if ($errors->has('ville')) <p class="help-block text-danger">{{$errors->first('ville')}}</p>@endif

        </div>


        <div class="form-group">
            <input type="text" name="email" id="email" class="form-control input-lg" value="{{ Input::old('email') }}" placeholder="E-mail">
            @if ($errors->has('email')) <p class="help-block text-danger">{{$errors->first('email')}}</p>@endif

        </div>


        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" value="{{ Input::old('password') }}"placeholder="Password">
            @if ($errors->has('password')) <p class="help-block text-danger">{{$errors->first('password')}}</p>@endif

        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" value="{{ Input::old('password_confirmation') }}" placeholder="Confirm Password">
            @if ($errors->has('password_confirmation')) <p class="help-block text-danger">{{$errors->first('password_confirmation')}}</p>@endif

        </div>

        <div class="form-group">
            <textarea type="description" name="description" id="description" class="form-control input-lg"  placeholder="Description">{{ Input::old('description') }}</textarea>
            @if ($errors->has('description')) <p class="help-block text-danger">{{$errors->first('description')}}</p>@endif

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

