<!doctype html>
<html>
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>AMovie</title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link
            href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
            rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700'
          rel='stylesheet' type='text/css'>
    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="/css/gozha-nav.css" rel="stylesheet"/>
    <!-- Select -->
    <link href="/css/external/jquery.selectbox.css"
          rel="stylesheet"/>

    @if($tema==='home')
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/js/rs-plugin/css/settings.css" media="screen"/>
    @elseif($tema==='single')
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
        <!-- Swiper slider -->
        <link href="/css/external/idangerous.swiper.css" rel="stylesheet"/>
        <!-- Magnific-popup -->
        <link href="/css/external/magnific-popup.css" rel="stylesheet"/>
    @elseif($tema==='list')
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
    @elseif($tema==='book')
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
    @endif

    <link href="/css/style.css?v=1" rel="stylesheet"/>
    <script src="/js/external/modernizr.custom.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->
</head>


<body>
<div class="wrapper">
    <!-- Banner -->
    <div class="banner-top">
        <img alt='top banner' src="/medias/banners/bra.jpg">
    </div>

    <!-- Header section -->
    <header class="header-wrapper">
        <div class="container">
            <!-- Logo link-->
            <a href='index.php' class="logo"> <img alt='logo'
                                                   src="/medias/logo.png">
            </a>

            <!-- Main website navigation-->
            <nav id="navigation-box">
                <!-- Toggle for mobile menu mode -->
                <a href="#" id="navigation-toggle"> <span class="menu-icon"> <span
                                class="icon-toggle" role="button" aria-label="Toggle Navigation">
								<span class="lines"></span>
						</span>
					</span>
                </a>

                <!-- Link navigation -->
                <ul id="navigation">
                    <li><span class="sub-nav-toggle plus"></span> <a href="#">Pages</a>
                        <ul>
                            <li class="menu__nav-item"><a href="movie-page-left.html">Single
                                    movie (rigth sidebar)</a></li>
                            <li class="menu__nav-item"><a href="movie-page-right.html">Single
                                    movie (left sidebar)</a></li>
                            <li class="menu__nav-item"><a href="movie-page-full.html">Single
                                    movie (full widht)</a></li>
                            <li class="menu__nav-item"><a href="movie-list-left.html">Movies
                                    list (rigth sidebar)</a></li>
                            <li class="menu__nav-item"><a href="movie-list-right.html">Movies
                                    list (left sidebar)</a></li>
                            <li class="menu__nav-item"><a href="movie-list-full.html">Movies
                                    list (full widht)</a></li>
                            <li class="menu__nav-item"><a href="single-cinema.html">Single
                                    cinema</a></li>
                            <li class="menu__nav-item"><a href="cinema-list.html">Cinemas
                                    list</a></li>
                            <li class="menu__nav-item"><a href="trailer.html">Trailers</a></li>
                            <li class="menu__nav-item"><a href="rates-left.html">Rates
                                    (rigth sidebar)</a></li>
                            <li class="menu__nav-item"><a href="rates-right.html">Rates
                                    (left sidebar)</a></li>
                            <li class="menu__nav-item"><a href="rates-full.html">Rates (full
                                    widht)</a></li>
                            <li class="menu__nav-item"><a href="offers.html">Offers</a></li>
                            <li class="menu__nav-item"><a href="contact.html">Contact us</a></li>
                            <li class="menu__nav-item"><a href="404.html">404 error</a></li>
                            <li class="menu__nav-item"><a href="coming-soon.html">Coming
                                    soon</a></li>
                            <li class="menu__nav-item"><a href="login.html">Login/Registration</a></li>
                        </ul>
                    </li>
                    <li><span class="sub-nav-toggle plus"></span> <a
                                href="page-elements.html">Features</a>
                        <ul>
                            <li class="menu__nav-item"><a href="typography.html">Typography</a></li>
                            <li class="menu__nav-item"><a href="page-elements.html">Shortcodes</a></li>
                            <li class="menu__nav-item"><a href="column.html">Columns</a></li>
                            <li class="menu__nav-item"><a href="icon-font.html">Icons</a></li>
                        </ul>
                    </li>
                    <li><span class="sub-nav-toggle plus"></span> <a
                                href="page-elements.html">Booking steps</a>
                        <ul>
                            <li class="menu__nav-item"><a href="book1.html">Booking step 1</a></li>
                            <li class="menu__nav-item"><a href="book2.html">Booking step 2</a></li>
                            <li class="menu__nav-item"><a href="book3-buy.html">Booking step
                                    3 (buy)</a></li>
                            <li class="menu__nav-item"><a href="book3-reserve.html">Booking
                                    step 3 (reserve)</a></li>
                            <li class="menu__nav-item"><a href="book-final.html">Final
                                    ticket view</a></li>
                        </ul>
                    </li>
                    <li><span class="sub-nav-toggle plus"></span> <a
                                href="gallery-four.html">Gallery</a>
                        <ul>
                            <li class="menu__nav-item"><a href="gallery-four.html">4 col
                                    gallery</a></li>
                            <li class="menu__nav-item"><a href="gallery-three.html">3 col
                                    gallery</a></li>
                            <li class="menu__nav-item"><a href="gallery-two.html">2 col
                                    gallery</a></li>
                        </ul>
                    </li>
                    <li><span class="sub-nav-toggle plus"></span> <a
                                href="news-left.html">News</a>
                        <ul>
                            <li class="menu__nav-item"><a href="news-left.html">News (rigth
                                    sidebar)</a></li>
                            <li class="menu__nav-item"><a href="news-right.html">News (left
                                    sidebar)</a></li>
                            <li class="menu__nav-item"><a href="news-full.html">News (full
                                    widht)</a></li>
                            <li class="menu__nav-item"><a href="single-page-left.html">Single
                                    post (rigth sidebar)</a></li>
                            <li class="menu__nav-item"><a href="single-page-right.html">Single
                                    post (left sidebar)</a></li>
                            <li class="menu__nav-item"><a href="single-page-full.html">Single
                                    post (full widht)</a></li>
                        </ul>
                    </li>
                    <li><span class="sub-nav-toggle plus"></span> <a href="#">Mega
                            menu</a>
                        <ul class="mega-menu container">
                            <li class="col-md-3 mega-menu__coloum">
                                <h4 class="mega-menu__heading">Now in the cinema</h4>
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">The Counselor</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Bad Grandpa</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Blue Is the
                                            Warmest Color</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Capital</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Spinning Plates</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Bastards</a></li>
                                </ul>
                            </li>

                            <li
                                    class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Gravity</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Captain Phillips</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Carrie</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Cloudy with a
                                            Chance of Meatballs 2</a></li>
                                </ul>
                            </li>

                            <li class="col-md-3 mega-menu__coloum">
                                <h4 class="mega-menu__heading">Ending soon</h4>
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Escape Plan</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Rush</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Prisoners</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Enough Said</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">The Fifth Estate</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Runner Runner</a></li>
                                </ul>
                            </li>

                            <li
                                    class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Insidious: Chapter
                                            2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Additional header buttons / Auth and direct link to booking-->
            <div class="control-panel">
                <?php login();?>
            </div>

        </div>
    </header>
<?php

function login()
{
    if (isset($_SESSION['user'])) {
        echo <<<_END
    <div class="auth auth--home">
						<div class="auth__show">
							<span class="auth__image"> <img alt=""
								src="http://placehold.it/31x31">
							</span>
						</div>
						<a href="#" class="btn btn--sign btn--singin"> me </a>
						<ul class="auth__function">
							<li><a href="#" class="auth__function-item">Watchlist</a></li>
							<li><a href="#" class="auth__function-item">Booked tickets</a></li>
							<li><a href="#" class="auth__function-item">Discussion</a></li>
							<li><a href="#" class="auth__function-item">Settings</a></li>
						</ul>

					</div>
    <a href="#"
						class="btn btn-md btn--warning btn--book btn-control--home login-window">Book
						a ticket</a>
_END;
    } else {
        echo <<<_END
          <a href="#" class="btn btn--sign login-window">Sign in</a>
                    <a href="#" class="btn btn-md btn--warning btn--book login-window">Book a ticket</a>
_END;
    }
}
?>