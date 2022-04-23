<!-- Modal -->
<div class="modal fade" id="modal-signin" tabindex="-1" aria-labelledby="modal-signin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white p-4 p-md-5 rounded border-0">            
            <div class="text-center">
                <h3 class="h1 fw-bolder mb-3">Sign In</h3>
                <p class="text-smaller text-muted mb-4" style="line-height: 1.5;">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Unde, vel odio non dicta.</p>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <a href="#" class="social-icon si-small si-colored si-facebook" title="Facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                </a>
                <a href="#" class="social-icon si-small si-colored si-google" title="google">
                    <i class="icon-google"></i>
                    <i class="icon-google"></i>
                </a>
                <a href="#" class="social-icon si-small si-colored si-appstore" title="apple">
                    <i class="icon-apple"></i>
                    <i class="icon-apple"></i>
                </a>
            </div>
            <div class="clear"></div>
            <div class="divider divider-center my-2"><span>OR</span></div>
            <form method="POST" class="mb-0 row" action="{{ route('login') }}">
                @csrf
                <div class="col-12 form-group">
                    <label class="nott ls0 fw-semibold mb-2" for="email">Your email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@site.com" value="{{ old('email') }}">
                </div>
                <div class="clear"></div>
                <div class="col-12 form-group">
                    <label class="nott ls0 fw-semibold mb-2" for="password">Password</label>
                    <div class="input-group">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="8+ characters required">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                        <label class="form-check-label nott ls0 mb-0 fw-semibold" for="inlineCheckbox2">Remember me</label>
                    </div>
                    <a href="#" class="text-smaller fw-medium"><u>Forgot Password?</u></a>
                </div>
                <div class="col-12 mt-4">
                    <button id="login-button" class="button button-large w-100 bg-alt py-2 rounded-1 fw-medium nott ls0 m-0" type="button">Login</button>
                </div>
            </form>
            <p class="mb-0 mt-4 text-center fw-semibold">Don't have an account? <a href="#"><u>Sign up</u></a></p>    

        </div>
    </div>
</div>

<!-- Header
============================================= -->
<header id="header" class="full-header header-size-md" data-mobile-sticky="true">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="home" class="standard-logo"><img src="{{ asset('demos/forum/images/canvasforum.png') }}" alt="Canvas Logo"></a>
                    <a href="home" class="retina-logo"><img src="{{ asset('demos/forum/images/canvasforum@2x.png') }}" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <div class="header-misc ms-0">

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                    </div><!-- #top-search end -->

                    @if (Auth::check())
                        <!-- Top Account
                        ============================================= -->
                        <div class="header-misc-icon">
                            <a href="#" id="notifylink" data-bs-toggle="dropdown" data-bs-offset="0,15" aria-haspopup="true" aria-expanded="false" data-offset="12,12"><i class="icon-line-bell notification-badge"></i></a>
                            <div class="dropdown-menu dropdown-menu-end py-0 m-0 overflow-auto" aria-labelledby="notifylink" style="width: 320px; max-height: 300px">
                                <span class="dropdown-header border-bottom border-f5 fw-medium text-uppercase ls1">Notifications</span>
                                <div class="list-group list-group-flush">
                                    <a href="#" class="d-flex list-group-item">
                                        <img src="demos/articles/images/authors/2.jpg" width="35" height="35" class="rounded-circle me-3 mt-1" alt="Profile">
                                        <div class="media-body">
                                            <h5 class="my-0 fw-normal text-muted"><span class="text-dark fw-bold">SemiColonWeb</span> has replied on your post <span class="text-dark fw-bold">Package Generator – Approx time for a file.</span></h5>
                                            <small class="text-smaller">10 mins ago</small>
                                        </div>
                                    </a>
                                    <a href="#" class="d-flex list-group-item">
                                        <i class="icon-line-check badge-icon bg-success text-white me-3 mt-1"></i>
                                        <div class="media-body">
                                            <h5 class="my-0 fw-normal text-muted"><span class="text-dark fw-bold">SemiColonWeb</span> has marked to your post as solved.</h5>
                                            <small class="text-smaller">2 days ago</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <!-- Top Account
                        ============================================= -->
                        <div class="header-misc-icon profile-image">
                            <a href="#" id="profilelink" data-bs-toggle="dropdown" data-bs-offset="0,15" aria-haspopup="true" aria-expanded="false" data-offset="12,12"><img class="rounded-circle" src="{{ asset('demos/forum/images/user.png') }}" alt="User"></a>
                            <div class="dropdown-menu dropdown-menu-end py-0 m-0" aria-labelledby="profilelink">
                                <a class="dropdown-item" href="demo-forum-edit.html"><i class="icon-line-edit me-2"></i>Edit Profile</a>
                                <a class="dropdown-item" href="demo-forum-single.html"><i class="icon-line-align-left me-2"></i>Your Topics</a>
                                <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="icon-line-log-out me-2"></i>Sign Out</a>
                                </form>
                            </div>
                        </div>                        
                    @else                        
                        <div class="header-misc">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-signin" class="button button-border border-default px-4 rounded-1 fw-medium nott ls0 m-0 px-3 h-op-09">Sign In</a>                            
                        </div>
                    @endif

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">
                        <li class="menu-item current"><a class="menu-link" href="{{ route('home') }}"><div>Home</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ route('questions.index') }}"><div>Questions</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="#" data-bs-toggle="modal" data-bs-target="#modal-signin"><div>Create</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="demo-forum-profile.html"><div>Profile</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="demo-forum-search-result.html"><div>Search Page</div></a></li>
                    </ul>

                </nav><!-- #primary-menu end -->

                <form class="top-search-form bg-alt dark" action="search.html" method="get">
                    <div class="container row justify-content-center">
                        <div class="col-sm-8">
                            <input type="text" name="q" class="form-control form-control-lg mb-5 border-color" value="" placeholder="Type Your Query &amp; Hit Enter.." autocomplete="off">
                            <div class="row col-mb-30">
                                <div class="col-md-6">
                                    <div class="widget widget_links clearfix">
                                        <h4 class="">Recent Topics</h4>
                                        <ul>
                                            <li><a href="demo-forum-single.html">Package Generator – Approx time for a file</a></li>
                                            <li><a href="demo-forum-single.html">Open sub-menu touching menu-item name</a></li>
                                            <li><a href="demo-forum-single.html">Portfolio Overlay Slide fadein fadeout</a></li>
                                            <li><a href="demo-forum-single.html">Show menu .dropdown-menu down only</a></li>
                                            <li><a href="demo-forum-single.html">Couldnt Generate Package Snippet</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="widget widget_links clearfix">
                                        <h4 class="">Helpful Documentation</h4>
                                        <ul>
                                            <li><a href="demo-forum-single.html">How to Install</a></li>
                                            <li><a href="demo-forum-single.html">How to setup Niche Demos</a></li>
                                            <li><a href="demo-forum-single.html">Header Layouts and Styles</a></li>
                                            <li><a href="demo-forum-single.html">Setup Forms</a></li>
                                            <li><a href="demo-forum-single.html">Setup RTL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->