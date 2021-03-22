<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" lang="en">


<head>
    <!-- Basic need -->
    <title>Films</title>
    <meta charset="UTF-8">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <link href="#" rel="profile">

    @stack('style')

    <!--Google Font-->
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' rel="stylesheet"/>
    <!-- Mobile specific meta -->
    <meta content="width=device-width, initial-scale=1" name=viewport>
    <meta content="telephone-no" name="format-detection">

    <!-- CSS files -->
    <link href="{{asset('web_files/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('web_files/css/style.css')}}" rel="stylesheet">

</head>
<body>
<!--preloading-->
<div id="preloader">
    <img alt="" class="logo" height="58" src="{{asset('web_files/images/logo1.png')}}" width="119">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a href="/"><img alt="" class="logo" height="58" src="{{asset('web_files/images/logo1.png')}}" width="119"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="/">
                            Home
                        </a>

                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="/movies">
                            movies
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="/actors">
                            actors
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="#contact_us">
                            contact us
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    @auth
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-hover="dropdown" data-toggle="dropdown">
                            <img src="{{auth()->user()->avatar}}" style="width: 30px; height: 30px; border-radius: 50px">&ensp;
                            {{auth()->user()->username}} &ensp;<i aria-hidden="true" class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu level1" style="background-color: #020d18;">
                            <li class="menu-hover"><a href="{{url('user/profile')}}">Profile</a></li>
                            <li class="menu-hover"><a href="{{url('user/favorites')}}">My Favorites List</a></li>
                            <li class="menu-hover"><a href="{{url('user/ratings')}}">My Rates</a></li>
                            <li class="menu-hover"><a href="{{url('user/reviews')}}">My Reviews</a></li>
                        </ul>
                    </li>
                        <li class="btn signupLink"><a href="{{route('logout')}}">Log Out</a></li>
                    @else
                        <li class="loginLink"><a href="{{route('login')}}">LOG In</a></li>
                        <li class="btn signupLink"><a href="{{route('register')}}">sign up</a></li>
                    @endauth

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!-- top search form -->
        <div class="top-search">
            <form action="/search" method="GET">
                <select name="search_category">
                    <option {{request()->search_category == 'movies' ? 'selected' : ''}} value="movies">Movies</option>
                    <option {{request()->search_category == 'actors' ? 'selected' : ''}} value="actors">Actors</option>
                </select>
                <input name="search" value="{{request()->search}}" placeholder="Search for a movie, TV Show or celebrity that you are looking for" type="text">
                <button type="submit" style="background-color: #dd003f!important; color: white; font-weight: bold; padding: 11px 25px">Search</button>
            </form>
        </div>
    </div>
</header>
<!-- END | Header -->

@yield('content')

<!-- footer section-->
<footer class="ht-footer" id="contact_us">
    <div class="container">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="flex-parent-ft">
                <div class="flex-child-ft item1">
                    <a href=""><img alt="" class="logo" src="{{asset('web_files/images/logo1.png')}}"></a>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="flex-parent-ft">
                <div class="flex-child-ft item1">
                    <div class="blog-detail-ct">
                        <div class="comment-form">
                            <h4>Contact us <i class="ion-paper-airplane"></i></h4>
                            <form action="{{url('message')}}" method="POST">
                                @csrf
                                @error('email')
                                <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input name="email" placeholder="Email" type="email" required>

                                @error('title')
                                <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input name="title" placeholder="Title" type="text" required>

                                @error('message')
                                <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <textarea name="message" id="" placeholder="Message" style="margin: 0px 0px 30px; resize: none" required></textarea>

                                <button class="submit" type="submit"> Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ft-copyright">
        <div class="ft-left">
            <p><a href="" target="_blank"></a>Made with <i class="ion-ios-heart" style="color: red"></i> by <span
                        style="color: orangered">Abdullah Shublaq</span></p>
        </div>
        <div class="backtotop">
            <p><a href="#" id="back-to-top" style="color: #dd003f; font-weight: bold">Back to top <i
                            class="ion-ios-arrow-thin-up"></i></a></p>
        </div>
    </div>
</footer>
<!-- end of footer section-->

<script src="{{asset('web_files/js/jquery.js')}}"></script>
<script src="{{asset('web_files/js/plugins.js')}}"></script>
<script src="{{asset('web_files/js/plugins2.js')}}"></script>
<script src="{{asset('web_files/js/custom.js')}}"></script>

<script src="{{asset('dashboard_files/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
@if(session('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            var allowDismiss = true;

            $.notify({
                    message: "{{ session('success') }}"
                },
                {
                    type: "alert-success",
                    allow_dismiss: allowDismiss,
                    newest_on_top: true,
                    timer: 1000,
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    animate: {
                        enter: "animated fadeIn",
                        exit: "animated fadeOut"
                    },
                    template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                });
        });
    </script>
@endif

@stack('script')

</body>


</html>
