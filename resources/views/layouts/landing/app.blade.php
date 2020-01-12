<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Of Site -->
    <title>Unify</title>
    <meta name="description" content="Unify university information system" />
    <meta name="keywords" content="unify, university, information, system, information system, university information system, Unify university information system" />
    <meta name="author" content="Drebakare">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{asset('_landing/assets/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_landing/assets/css/owl.carousel.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_landing/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_landing/assets/css/style.css')}}" rel="stylesheet" media="screen">

    <!-- Fonts -->
    <link href='../../../../fonts.googleapis.com/css6ea3.css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="{{asset('_landing/assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
 @include('layouts.landing.include.header')
 @yield("contents")
 @include('layouts.landing.include.popup')
 @include('layouts.landing.include.footer')

<script src="{{asset('_landing/assets/js/jQuery_v3_2_0.min.js')}}"></script>
<script src="{{asset('_landing/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('_landing/assets/plugins/owl.carousel.min.js')}}"></script>
<script src="{{asset('_landing/assets/js/js.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 @yield("page_scripts")
 <script type="text/javascript">
     @if(session('failure'))
     toastr.error('{{session("failure")}}');
     @endif
     @if(session('success'))
     toastr.success('{{session("success")}}');
     @endif
 </script>
</body>
</html>
