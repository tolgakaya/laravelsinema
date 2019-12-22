@extends('layouts.layout')
@section('arama')
    @include('search')
@endsection
@section('container')
    <div class="col-sm-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="movie">
            <h2 class="page-heading"><?php echo $movie->adi;?></h2>

            <div class="movie__info">
                <div class="col-sm-4 col-md-3 movie-mobile">
                    <div class="movie__images">
                        <span class="movie__rating">5.0</span>
                        <?php
                        $tek_resim = $movie->galeri->tek_sayfa_resmi;
                        if (!empty($tek_resim)) {
                            echo "<img alt='' src='$tek_resim'>";
                        } else {
                            echo "<img alt='' src='olmadi'>";
                        }
                        ?>
                    </div>
                    <div class="movie__rate">
                        Your vote:
                        <div id='score' class="score"></div>
                    </div>
                </div>

                <div class="col-sm-8 col-md-9">
                    <p class="movie__time"><?php echo $movie->suresi;?></p>

                    <p class="movie__option">
                        <strong>Ülke: </strong><a href="#"><?php echo $movie->ulke; ?></a>
                    </p>
                    <p class="movie__option">
                        <strong>Yapım Yılı: </strong><a href="#"><?php echo $movie->yil; ?></a>
                    </p>
                    <p class="movie__option">
                        <strong>Kategori: </strong><a href="#"><?php echo $movie->kategori; ?></a>
                    </p>

                    <p class="movie__option">
                        <strong>Yönetmen: </strong><a href="#">P<?php echo $movie->yonetmen; ?></a>
                    </p>
                    <p class="movie__option">
                        <strong>Oyuncular: </strong><a href="#"><?php echo $movie->oyuncular; ?></a>
                        <a href="#">...</a>
                    </p>
                    <p class="movie__option">
                        <strong>Yaş Sınırı: </strong><a href="#"><?php echo $movie->yas_siniri; ?></a>
                    </p>


                    <a href="#" class="comment-link">Yorumlar: 15</a>

                    <div class="movie__btns movie__btns--full">
                        <a href="/seans-secimi/{{$movie->movie_id}}"
                           class="btn btn-md btn--warning">Bu filim için bilet al</a>
                        <a href="#" class="watchlist"></a>
                    </div>

                    <div class="share">
                        <span class="share__marker">Paylaş: </span>
                        <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_facebook_like"
                               fb:like:layout="button_count"></a> <a
                                    class="addthis_button_tweet"></a> <a
                                    class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <h2 class="page-heading">Filmin Konusu</h2>

            <p class="movie__describe"><?php echo $movie->konu;?></p>

            <h2 class="page-heading">Resimler &amp; Videolar</h2>

            <div class="movie__media">
                <div class="movie__media-switch">
                    <a href="#" class="watchlist list--photo" data-filter='media-photo'>234
                        photos</a> <a href="#" class="watchlist list--video"
                                      data-filter='media-video'>10 videos</a>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php

                        $swiper_videolari = $movie->galeri->swiper_videolari;
                        $swiper_resimleri = $movie->galeri->swiper_resimleri;
                        foreach ($swiper_videolari as $kucuk_resim => $buyuk_resim) {
                            echo <<<_END
					<div class="swiper-slide media-video">
							<a href='$buyuk_resim'
								class="movie__media-item "> <img alt=''
								src="$kucuk_resim">
							</a>
						</div>
_END;
                        }

                        foreach ($swiper_resimleri as $kucuk_resim => $buyuk_resim) {
                            echo <<<_END
				<div class="swiper-slide media-photo">
							<a href='$buyuk_resim'  class="movie__media-item">
								<img alt='' src="$buyuk_resim">
							</a>
						</div>
_END;
                        }
                        ?>


                    </div>
                </div>

            </div>

        </div>

        <h2 class="page-heading">showtime &amp; tickets</h2>
        <div class="choose-container">
            <form id='select' class="select" method='get'>
                <select name="select_item" id="select-sort" class="select__sort"
                        tabindex="0">
                    <option value="1" selected='selected'>London</option>
                    <option value="2">New York</option>
                    <option value="3">Paris</option>
                    <option value="4">Berlin</option>
                    <option value="5">Moscow</option>
                    <option value="3">Minsk</option>
                    <option value="4">Warsawa</option>
                    <option value="5">Kiev</option>
                </select>
            </form>

            <div class="datepicker">
                <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                <input type="text" id="datepicker" value='03/10/2014'
                       class="datepicker__input">
            </div>

            <a href="#" id="map-switch"
               class="watchlist watchlist--map watchlist--map-full"><span
                        class="show-map">Show cinemas on map</span><span class="show-time">Show
					cinema time table</span></a>

            <div class="clearfix"></div>

            <div class="time-select">

                <?php
                $seanslar = $movie->seanslar;

                foreach ($seanslar as $salon_id => $saatler) {
                    echo <<<_END
    <div class="time-select__group">
    <div class="col-sm-4">
						<p class="time-select__place">$salon_id</p>
					</div>
    <ul class="col-sm-8 items-wrap">
_END;

                    foreach ($saatler as $saat) {
                        echo <<<_END
    <li class="time-select__item" data-time='$saat'>$saat</li>
_END;
                    }
                    echo "</ul></div>";
                }
                ?>

            </div>

            <!-- hiden maps with multiple locator-->
            <div class="map">
                <div id='cimenas-map'></div>
            </div>

            <h2 class="page-heading">comments (15)</h2>

            <div class="comment-wrapper">
                <form id="comment-form" class="comment-form" method='post'>
					<textarea class="comment-form__text"
                              placeholder='Add you comment here'></textarea>
                    <label class="comment-form__info">250 characters left</label>
                    <button type='submit'
                            class="btn btn-md btn--danger comment-form__btn">add comment
                    </button>
                </form>

                <div class="comment-sets">

                    <div class="comment">
                        <div class="comment__images">
                            <img alt='' src="http://placehold.it/50x50">
                        </div>

                        <a href='#' class="comment__author"><span
                                    class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                        <p class="comment__date">today | 03:04</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod
                            erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                            justo, volutpat at viverra a, mattis in velit. Morbi molestie
                            rhoncus enim, vitae sagittis dolor tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div class="comment">
                        <div class="comment__images">
                            <img alt='' src="http://placehold.it/50x50">
                        </div>

                        <a href='#' class="comment__author"><span
                                    class="social-used fa fa-vk"></span>Olia Gozha</a>
                        <p class="comment__date">22.10.2013 | 14:40</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod
                            erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                            justo, volutpat at viverra a, mattis in velit. Morbi molestie
                            rhoncus enim, vitae sagittis dolor tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div class="comment comment--answer">
                        <div class="comment__images">
                            <img alt='' src="http://placehold.it/50x50">
                        </div>

                        <a href='#' class="comment__author"><span
                                    class="social-used fa fa-vk"></span>Dmitriy Pustovalov</a>
                        <p class="comment__date">today | 10:19</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod
                            erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                            justo, volutpat at viverra a, mattis in velit. Morbi molestie
                            rhoncus enim, vitae sagittis dolor tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div class="comment comment--last">
                        <div class="comment__images">
                            <img alt='' src="http://placehold.it/50x50">
                        </div>

                        <a href='#' class="comment__author"><span
                                    class="social-used fa fa-facebook"></span>Sia Andrews</a>
                        <p class="comment__date">22.10.2013 | 12:31</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod
                            erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                            justo, volutpat at viverra a, mattis in velit. Morbi molestie
                            rhoncus enim, vitae sagittis dolor tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div id='hide-comments' class="hide-comments">
                        <div class="comment">
                            <div class="comment__images">
                                <img alt='' src="http://placehold.it/50x50">
                            </div>

                            <a href='#' class="comment__author"><span
                                        class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                            <p class="comment__date">today | 03:04</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod
                                erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie
                                rhoncus enim, vitae sagittis dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment">
                            <div class="comment__images">
                                <img alt='' src="http://placehold.it/50x50">
                            </div>

                            <a href='#' class="comment__author"><span
                                        class="social-used fa fa-vk"></span>Olia Gozha</a>
                            <p class="comment__date">22.10.2013 | 14:40</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod
                                erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie
                                rhoncus enim, vitae sagittis dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>
                    </div>

                    <div class="comment-more">
                        <a href="#" class="watchlist">Show more comments</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection