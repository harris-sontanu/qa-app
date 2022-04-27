<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="SemiColonWeb" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Stylesheets
============================================= -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />

<link rel="stylesheet" href="{{ asset('css/dark.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" />

<link rel="stylesheet" href="{{ asset('css/colors.php?color=F9BE79') }}" type="text/css" />

<!-- Forum Demo Specific Stylesheet -->
<link rel="stylesheet" href="{{ asset('demos/forum/forum.css') }}" type="text/css" /> <!-- Forum Custom Css -->
<link rel="stylesheet" href="{{ asset('demos/forum/css/fonts.css') }}" type="text/css" /> <!-- Forum Custom Fonts -->
<!-- / -->

<link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />

<!-- Document Title
============================================= -->
<title>@yield('title', 'Question & Answer')</title>