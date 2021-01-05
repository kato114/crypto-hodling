<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('assets/images/'.$gs->favicon)}}" type="image/x-icon">
    <meta name="robots" content="index, follow" />
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="msapplication-TileColor" content="#051b4c">
    <meta name="theme-color" content="#051b4c">
    
    <title>Trading Simulator</title>

    <link rel="stylesheet" href="{{ asset('assets/front/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/libs/animate.min.css') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/fontawesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/libs/spacing.min.css') }}">
</head>
<body>
    @yield('body')
    <script src="{{ asset('assets/front/libs/jquery/3.3.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/libs/wow.min.js') }}"></script>
    <script src="{{ asset('assets/front/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/main.js') }}"></script>
    <script src="{{ asset('assets/front/libs/charts/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/front/libs/charts/chartjs-plugin-deferred.min.js') }}"></script> 
    <script src="{{ asset('assets/front/js/common.js') }}"></script>
    <script src="{{ asset('assets/front/libs/skrollr.js') }}"></script>
</body>
</html>
