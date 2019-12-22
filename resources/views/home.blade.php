@extends('layouts.layout')
@section('arama')

    <!-- Slider -->
    <div class="bannercontainer">
        <div id="clcdiv" class="banner">
            <ul>

                <li data-transition="fade" data-slotamount="7" class="slide"
                    data-slide='<?php echo $home->slidelar[1]->baslik ;?>'><img alt=''
                                                                                src="<?php echo $home->slidelar[0]->resim;?>">
                    <div class="caption slide__name margin-slider" data-x="right"
                         data-y="80" data-splitin="chars" data-elementdelay="0.1"
                         data-speed="700" data-start="1400" data-easing="easeOutBack"
                         data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                         data-frames="{ typ :lines;
                                                 elementdelay :0.1;
                                                 start:1650;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 },
                                                 { typ :lines;
                                                 elementdelay :0.1;
                                                 start:2150;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 }
                                                 "
                         data-splitout="lines" data-endelementdelay="0.1"
                         data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"
                         data-endspeed="500" data-end="8400" data-endeasing="Back.easeIn">
                        <?php echo $home->slidelar[0]->baslik;?></div>

                    <div class="caption slide__time margin-slider sfr str"
                         data-x="right" data-hoffset='-243' data-y="186" data-speed="300"
                         data-start="2100" data-easing="easeOutBack" data-endspeed="300"
                         data-end="8700" data-endeasing="Back.easeIn"><?php echo $home->slidelar[0]->altlar[0];?></div>
                    <div class="caption slide__date margin-slider lfb ltb"
                         data-x="right" data-hoffset='-149' data-y="186" data-speed="500"
                         data-start="2400" data-easing="Power4.easeOut" data-endspeed="400"
                         data-end="8200" data-endeasing="Back.easeIn"><?php echo $home->slidelar[0]->altlar[1];?></div>
                    <div class="caption slide__time margin-slider sfr str"
                         data-x="right" data-hoffset='-113' data-y="186" data-speed="300"
                         data-start="2100" data-easing="easeOutBack" data-endspeed="300"
                         data-end="8700" data-endeasing="Back.easeIn"><?php echo $home->slidelar[0]->altlar[2];?></div>
                    <div class="caption slide__date margin-slider lfb ltb"
                         data-x="right" data-y="186" data-speed="500" data-start="2800"
                         data-easing="Power4.easeOut" data-endspeed="400" data-end="8200"
                         data-endeasing="Back.easeIn"><?php echo $home->slidelar[0]->altlar[3];?></div>
                    <div class="caption slide__text margin-slider customin customout"
                         data-x="right" data-y="250"
                         data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="400" data-start="3000" data-endspeed="400"
                         data-end="8000" data-endeasing="Back.easeIn">
                        <?php echo $home->slidelar[0]->yazi;?><br>

                    </div>
                    <div <?php linkimiz(1); ?>  class="caption margin-slider skewfromright customout "
                         data-x="right" data-y="324"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="400" data-start="3300" data-easing="Power4.easeOut"
                         data-endspeed="300" data-end="7700" data-endeasing="Power4.easeOut">
                        <a href="index.php?action=single&movie_id=1" name="buton" id="btn1"
                           class="slide__link"><?php echo $home->slidelar[0]->buton;?></a>
                    </div>
                </li>

                <li data-transition="fade" data-slotamount="7"
                    class="slide fading-slide"
                    data-slide='<?php echo $home->slidelar[2]->baslik;?>'><img alt=''
                                                                               src="<?php echo $home->slidelar[1]->resim; ?>">
                    <div class="caption slide__video" data-x="0" data-y="0"
                         data-autoplay='true'>
                        <video class="media-element" autoplay="autoplay" preload='none'
                               loop="loop" muted="" src="images/video/53170154.mp4">
                            <source type="video/webm" src="images/video/53170154.webm">
                            <source type="video/mp4" src="images/video/53170154.mp4">
                            <source type="video/ogg" src="images/video/53170154.ogv">
                        </video>
                    </div>

                    <div class="caption slide__name slide__name--smaller" data-x="left"
                         data-y="160" data-splitin="chars" data-elementdelay="0.1"
                         data-speed="700" data-start="1400" data-easing="easeOutBack"
                         data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                         data-frames="{ typ :lines;
                                                 elementdelay :0.1;
                                                 start:1650;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 },
                                                 { typ :lines;
                                                 elementdelay :0.1;
                                                 start:2150;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 }
                                                 "
                         data-splitout="lines" data-endelementdelay="0.1"
                         data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"
                         data-endspeed="500" data-endeasing="Back.easeIn"><?php echo $home->slidelar[1]->baslik; ?></div>

                    <div
                            class="caption slide__time position-center postion-place--one sfr stl"
                            data-x="left" data-y="242" data-speed="300" data-start="2100"
                            data-easing="easeOutBack" data-endspeed="300"
                            data-endeasing="Back.easeIn"><?php echo $home->slidelar[1]->altlar[0]; ?></div>
                    <div
                            class="caption slide__date position-center postion-place--two lfb ltb"
                            data-x="left" data-y="242" data-speed="500" data-start="2400"
                            data-easing="Power4.easeOut" data-endspeed="400"
                            data-endeasing="Back.easeIn"><?php echo $home->slidelar[1]->altlar[1]; ?></div>
                    <div
                            class="caption slide__time position-center postion-place--three sfr stl"
                            data-x="left" data-y="242" data-speed="300" data-start="2100"
                            data-easing="easeOutBack" data-endspeed="300"
                            data-endeasing="Back.easeIn"><?php echo $home->slidelar[1]->altlar[2]; ?></div>
                    <div
                            class="caption slide__date position-center postion-place--four lfb ltb"
                            data-x="left" data-y="242" data-speed="500" data-start="2800"
                            data-easing="Power4.easeOut" data-endspeed="400"
                            data-endeasing="Back.easeIn"><?php echo $home->slidelar[1]->altlar[3]; ?></div>

                    <div <?php linkimiz(1); ?> class="caption lfb slider-wrap-btn ltb" data-x="left"
                         data-y="310" data-speed="400" data-start="3300"
                         data-easing="Power4.easeOut" data-endspeed="500"
                         data-endeasing="Power4.easeOut">
                        <a
                                href="http://localhost/sinamur2016/index.php?action=single&movie_id=1"
                                id="btn3"
                                class="btn btn-md btn--danger btn--wide slider--btn"><?php echo $home->slidelar[1]->buton; ?></a>

                    </div>
                </li>

                <li data-transition="fade" data-slotamount="7" class="slide"
                    data-slide='<?php echo $home->slidelar[0]->baslik;?>'><img alt=''
                                                                               src="<?php echo $home->slidelar[2]->resim; ?>">
                    <div class="caption slide__video" data-x="0" data-y="0"
                         data-autoplay='true'>
                        <video class="media-element" autoplay="autoplay" preload='none'
                               loop="loop" muted="" src="images/video/53170154.mp4">
                            <source type="video/webm" src="images/video/53170154.webm">
                            <source type="video/mp4" src="images/video/53170154.mp4">
                            <source type="video/ogg" src="images/video/53170154.ogv">
                        </video>
                    </div>
                    <div
                            class="caption slide__name slide__name--smaller slide__name--specific customin customout"
                            data-x="left" data-y="160"
                            data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="700" data-start="1400" data-easing="easeOutBack"
                            data-endspeed="500" data-end="8600" data-endeasing="Back.easeIn">
                        <span class="highlight"><?php echo $home->slidelar[2]->baslik; ?></span>
                    </div>

                    <div class="caption slide__descript customin customout"
                         data-x="left" data-y="240"
                         data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="700" data-start="2000" data-endspeed="500"
                         data-end="8400" data-endeasing="Back.easeIn"> <?php echo $home->slidelar[2]->alt_baslik; ?>
                    </div>

                    <div <?php linkimiz(1); ?> class="caption lfb customout slider-wrap-btn"
                         data-x="left"
                         data-y="310" data-speed="500" data-start="2800"
                         data-easing="Power4.easeOut"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-endspeed="400" data-end="8000" data-endeasing="Power4.easeOut">
                        <a
                                href="http://localhost/sinamur2016/index.php?action=single&movie_id=1"
                                name="buton"
                                class="btn btn-md btn--danger slider--btn"><?php echo $home->slidelar[2]->buton; ?></a>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <!--end slider -->
@endsection

@section('container')
    <?php
    function linkimiz($var)
    {
        if (isset($var) && !empty($var)) {
            echo <<<_END

            onClick = "window.open('index.php?action=single&movie_id=$var','_self');"

_END;
        }
    }
    ?>




    <!-- Main content -->
    <section class="container">
        <div class="movie-best">
            <div class="col-sm-10 col-sm-offset-1 movie-best__rating">Sinamur 2016</div>

            <div class="col-sm-12 change--col">

                <?php
                foreach ($home->filimler as $filim) {

                    echo <<<_END
                         <div class="movie-beta__item ">
                        <img alt='' src="$filim->poster">
                          <a href="index.php?action=single&movie_id=$filim->movie_id" class="slide__link"><span class="best-rate">5.0</span></a>

                         <ul class="movie-beta__info">
                             <li><span class="best-voted">71 people voted today</span></li>
                             <li>
                                <p class="movie__time">$filim->suresi</p>
                                <p>$filim->kategori </p>
                                <p>38 comments</p>
                             </li>
                             <li class="last-block">
                                 <a href="index.php?action=single&movie_id=$filim->movie_id" class="slide__link">Devamı</a>
                             </li>
                         </ul>
                     </div>
_END;
                }
                ?>


                <div class="col-sm-10 col-sm-offset-1 movie-best__check">
                    <a href="index.php?action=list">Bütün filimlere bakın</a>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <div class="clearfix"></div>
    <script type="text/javascript">
        $("#clcdiv").click(function () {
            alert("Handler for .click() called.");
        });
    </script>
@endsection
