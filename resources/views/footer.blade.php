<div class="clearfix"></div>

<footer class="footer-wrapper">
    <section class="container">
        <div class="col-xs-4 col-md-2 footer-nav">
            <ul class="nav-link">
                <li><a href="#" class="nav-link__item">Cities</a></li>
                <li><a href="movie-list-left.html" class="nav-link__item">Movies</a></li>
                <li><a href="trailer.html" class="nav-link__item">Trailers</a></li>
                <li><a href="rates-left.html" class="nav-link__item">Rates</a></li>
            </ul>
        </div>
        <div class="col-xs-4 col-md-2 footer-nav">
            <ul class="nav-link">
                <li><a href="coming-soon.html" class="nav-link__item">Coming soon</a></li>
                <li><a href="cinema-list.html" class="nav-link__item">Cinemas</a></li>
                <li><a href="offers.html" class="nav-link__item">Best offers</a></li>
                <li><a href="news-left.html" class="nav-link__item">News</a></li>
            </ul>
        </div>
        <div class="col-xs-4 col-md-2 footer-nav">
            <ul class="nav-link">
                <li><a href="#" class="nav-link__item">Terms of use</a></li>
                <li><a href="gallery-four.html" class="nav-link__item">Gallery</a></li>
                <li><a href="contact.html" class="nav-link__item">Contacts</a></li>
                <li><a href="page-elements.html" class="nav-link__item">Shortcodes</a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="footer-info">
                <p class="heading-special--small">
                    A.Movie<br> <span class="title-edition">in the social media</span>
                </p>

                <div class="social">
                    <a href='#' class="social__variant fa fa-facebook"></a> <a href='#'
                                                                               class="social__variant fa fa-twitter"></a>
                    <a href='#'
                       class="social__variant fa fa-vk"></a> <a href='#'
                                                                class="social__variant fa fa-instagram"></a> <a href='#'
                                                                                                                class="social__variant fa fa-tumblr"></a>
                    <a href='#'
                       class="social__variant fa fa-pinterest"></a>
                </div>

                <div class="clearfix"></div>
                <p class="copy">&copy; A.Movie, 2013. All rights reserved. Done by
                    Olia Gozha</p>
            </div>
        </div>
    </section>
</footer>
</div>

<!-- open/close -->
<div class="overlay overlay-hugeinc">

    <section class="container">

        <div class="col-sm-4 col-sm-offset-4">
            <button type="button" class="overlay-close">Close</button>
            <form id="login-form" class="login" method='get' novalidate=''>
                <p class="login__title">
                    sign in <br> <span class="login-edition">welcome to A.Movie</span>
                </p>

                <div class="social social--colored">
                    <a href='#' class="social__variant fa fa-facebook"></a> <a href='#'
                                                                               class="social__variant fa fa-twitter"></a>
                    <a href='#'
                       class="social__variant fa fa-tumblr"></a>
                </div>

                <p class="login__tracker">or</p>

                <div class="field-wrap">
                    <input type='email' placeholder='Email' name='user-email'
                           class="login__input"> <input type='password'
                                                        placeholder='Password' name='user-password'
                                                        class="login__input">

                    <input type='checkbox' id='#informed' class='login__check styled'>
                    <label for='#informed' class='login__check-info'>remember me</label>
                </div>

                <div class="login__control">
                    <button type='submit' class="btn btn-md btn--warning btn--wider">sign
                        in
                    </button>
                    <a href="#" class="login__tracker form__tracker">Forgot password?</a>
                </div>
            </form>
        </div>

    </section>
</div>
<!-- JavaScript-->
<!-- jQuery 1.9.1-->
<!--<script
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
<script src="/js/yedek/jquery-2.1.3.min.js"></script>
<script>
    window.jQuery
    || document
            .write('<script src="/js/external/jquery-1.10.1.min.js"><\/script>')
</script>
<!-- Migrate -->
<script src="/js/external/jquery-migrate-1.2.1.min.js"></script>
<!--<script
        src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script> -->
<script src="/js/yedek/bootstrap.min.js"></script>
<!-- Mobile menu -->
<script src="/js/jquery.mobile.menu.js"></script>
<!-- Select -->
<script src="/js/external/jquery.selectbox-0.2.min.js"></script>

<!-- Stars rate -->
<script src="/js/external/jquery.raty.js"></script>
<!--<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
<script src="/js/yedek/jquery-ui-1.11.4.min.js"></script>
@if ($tema == "single")

    <!-- sadece tek -->
    <!-- Swiper slider -->
    <script src="/js/external/idangerous.swiper.min.js"></script>
    <!-- sadece tek ama ��pheli -->
    <!-- Magnific-popup -->
    <script src="/js/external/jquery.magnific-popup.min.js"></script>

    <!-- sadece tek -->
    <!--*** Google map  ***-->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <!--*** Google map infobox  ***-->
    <script src="/js/external/infobox.js"></script>
    <!-- Share buttons -->
    <script type="text/javascript">
        var addthis_config = {
            "data_track_addressbar": true
        };
    </script>
    <!-- sadece tek -->

    <script type="text/javascript"
            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525fd5e9061e7ef0"></script>
    <!--  sadece tek-->
    <script type="text/javascript">
        $(document).ready(function () {
            init_MoviePage();
            init_MoviePageFull();
        });
    </script>
@elseif ( $tema  === "book1") {
// action=book
// step=1

<script type="text/javascript">
    $(document).ready(function () {
        init_BookingOne();
    });
</script>

@elseif ($tema === "book2") {

<script type="text/javascript">
    $(document).ready(function () {
        init_BookingTwo();
    });
</script>


@elseif ($tema === "book3")

    <script type="text/javascript">
        $(document).ready(function () {
            init_Fiyatlandir();
        });
    </script>


@elseif ($tema === "liste")

    <script type="text/javascript">
        $(document).ready(function () {
            init_MovieList();
        });
    </script>
@elseif ($tema === "home")

    <script type="text/javascript" src="/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            init_Home();
        });
    </script>
    @else
    {{$tema}}
@endif
<!-- <script type="text/javascript">
    // 	$( "#clcdiv" ).click(function() {
    // 		  alert( "Handler for .click() called." );
    // 		});
            </script>-->


<!-- Form element -->
<script src="/js/external/form-element.js"></script>
<!-- Form validation -->
<script src="/js/form.js"></script>

<!-- Custom -->
<script src="/js/custom.js"></script>

</body>
</html>
