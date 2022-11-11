<head>
    <!-- basic -->
    
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <meta name="viewport" content="width=devics-width,initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- site metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel = "icon" href ="{{asset('asset/web/asset/images/logo1.png')}}" type = "image/x-icon">
    <!-- bootstrap css -->
    
    <link rel="stylesheet" href="{{asset('asset/web/asset/css/bootstrap.min.css')}}">
    <!-- style css -->
    @if (config('app.env') == 'local')
    <link rel="stylesheet" href="{{asset('asset/web/asset/css/style.css')}}">
    @else
    <link rel="stylesheet" href="{{asset(mix('asset/web/asset/css/style.css'),true)}}">
    @endif
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('asset/web/asset/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('asset/web/asset/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('asset/web/asset/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
     @yield('css')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
 </head>