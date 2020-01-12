<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <title>UnifyMe</title>

    <!-- Styles -->
    <link href="{{asset('_dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_dashboard/assets/css/chartist.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_dashboard/assets/css/owl.carousel.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_dashboard/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_dashboard/assets/css/style.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_dashboard/assets/css/jquery.dataTables.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('_dashboard/assets/css/responsive.dataTables.min.css')}}" rel="stylesheet" media="screen">

    <!-- Fonts -->
    <link href='../../../../../fonts.googleapis.com/css6ea3.css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="{{asset('_dashboard/assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" media="screen">

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    @include('layouts.landing.user_include.header')
    <div class="parent-wrapper" id="outer-wrapper">
        @include('layouts.landing.user_include.sidebar')
        <div class="main-content" id="content-wrapper">
            @yield("contents")
            @include('layouts.landing.user_include.footer')
        </div>
    </div>

<script src="{{asset('_dashboard/assets/js/jQuery_v3_2_0.min.js')}}"></script>
<script src="{{asset('_dashboard/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('_dashboard/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('_dashboard/assets/plugins/owl.carousel.min.js')}}"></script>
<script src="{{asset('_dashboard/assets/plugins/Chart.min.js')}}"></script>
<script src="{{asset('_dashboard/assets/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('_dashboard/assets/plugins/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('_dashboard/assets/js/js.js')}}"></script>
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

