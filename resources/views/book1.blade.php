@extends('layouts.layout')
@section('arama')
    @include('search')
@endsection
@section('container')
    <section class="container">
        <div class="order-container">
            <div class="order">

                <div class="order__control">
                    <a href="#" class="order__control-btn active">Purchase</a> <a
                            href="#" class="order__control-btn">Reserve</a>
                </div>
            </div>

        </div>

        <div class="order-step-area">
            <div class="order-step first--step">1. What &amp; Where &amp; When</div>
        </div>

        <h2 class="page-heading heading--outcontainer">Choose a movie</h2>
    </section>


    <!-- 		<div class="choose-film"> -->
    <!-- 			<div class="swiper-container"> -->
    <!-- 				<div class="swiper-wrapper"> -->


    <!-- 				</div> -->
    <!-- 			</div> -->
    <!-- 		</div> -->




    <section class="container">
        <div class="col-sm-12">
            <div class="choose-indector choose-indector--film">
                <strong>Choosen: </strong><span class="choosen-area"></span>
            </div>

            <h2 class="page-heading">City &amp; Date</h2>

            <div class="choose-container choose-container--short">
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
                    <input type="text" id="datepicker"
                           value='<?php echo date('d-m-Y');?>' class="datepicker__input">
                </div>
            </div>

            <h2 class="page-heading">Pick time</h2>

            <div id='seansdiv' class="time-select time-select--wide">
                <?php echo $bookinfo->seans_dondur();?>
            </div>

            <div class="choose-indector choose-indector--time">
                <strong>Choosen: </strong><span class="choosen-area"></span>
            </div>
        </div>

    </section>
    <div class="clearfix"></div>


    <form id='film-and-time' class="booking-form" method='post' action='{{route('step2')}}'>
        {{ csrf_field() }}
        <input type='text' name='choosen-movie' class="choosen-movie"  value="<?php echo $bookinfo->movie_id;?>">
    <input type='text' name='choosen-city' class="choosen-city">
    <input type='text' name='filim_adi' value="{{$bookinfo->filim_adi}}">
        <!-- echo filim_adi($movie_id);?>-->
        <input type='text' name='choosen-date' class="choosen-date">
    <input type='text' name='choosen-cinema' class="choosen-cinema">
    <input type='text' name='choosen-time' class="choosen-time">


        <div class="booking-pagination">
            <a href="#" class="booking-pagination__prev hide--arrow"> <span
                        class="arrow__text arrow--prev"></span> <span class="arrow__info"></span>
            </a> <a href="#" class="booking-pagination__next-"
                    onclick="document.getElementById('film-and-time').submit()"><span
                        class="arrow__info">choose a sit</span> </a>
        </div>

    </form>
@endsection