<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    @include('includes.head')

</head>

<body class="stretched search-overlay">

    <!-- Document Wrapper ============================================= -->
    <div id="wrapper" class="clearfix">

        @include('includes.header')

        @yield('content')

        @include('includes.footer')

    </div><!-- #wrapper end -->

    <!-- Go To Top ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts ============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins.min.js') }}"></script>

    <!-- TinyMCE Plugin -->
    <script src="{{ asset('js/components/tinymce/tinymce.min.js') }}"></script>

    <!-- Footer Scripts ============================================= -->
    <script src="{{ asset('js/functions.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
