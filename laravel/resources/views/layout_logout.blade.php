<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sign In - PixelAdmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    @section('css')
            <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

    <!-- Pixel Admin's stylesheets -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
    <link href={{asset('css/pages.min.css')}} rel="stylesheet" type="text/css">

    <link href={{asset('css/main.css')}} rel="stylesheet" type="text/css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    @show
    	<!--[if lt IE 9]>
    <script src="assets/javascripts/ie.min.js"></script>
    <![endif]-->

</head>


<!-- 1. $BODY ======================================================================================

	Body

	Classes:
	* 'theme-{THEME NAME}'
	* 'right-to-left'     - Sets text direction to right-to-left
-->
<body class="theme-default page-signin-alt">
<!-- Demo script --> <script src="assets/demo/demo.js"></script> <!-- / Demo script -->



<!-- 2. $MAIN_NAVIGATION ===========================================================================

	Main navigation
-->

<div class="signin-header">
    <a href="index.html" class="logo">
        <div class="demo-logo bg-primary"><img src="assets/demo/logo-big.png" alt="" style="margin-top: -4px;"></div>&nbsp;
        <strong>Ciné</strong>Canicule
    </a> <!-- / .logo -->
    <a href="" class="btn btn-primary ">Sign Up</a>
</div> <!-- / .header -->

@include('Partials/_flashdatas')



@yield('content')



@section('js')

        <!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<!-- Pixel Admin's javascripts -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/pixel-admin.min.js')}}"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>
{{--select2--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.PixelAdmin.start(init);
</script>

@show
</body>
</html>