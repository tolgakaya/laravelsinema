@extends('layouts.layout');
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
        <?php var_dump($_SESSION['bilet']); ?>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable ">1. What
                &amp; Where &amp; When
            </div>
            <div class="order-step second--step">2. Choose a sit</div>
        </div>

        <div class="choose-sits">
            <div class="choose-sits__info choose-sits__info--first">
                <ul>
                    <li class="sits-price marker--none"><strong>Price</strong></li>
                    <li class="sits-price sits-price--cheap">$10</li>
                    <li class="sits-price sits-price--middle">$20</li>
                    <li class="sits-price sits-price--expensive">$30</li>
                </ul>
            </div>

            <div class="choose-sits__info">
                <ul>
                    <li class="sits-state sits-state--not">Not available</li>
                    <li class="sits-state sits-state--your">Your choice</li>
                </ul>
            </div>

            <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                <div class="sits-area hidden-xs">
                    <div class="sits-anchor">screen</div>
                    {{$plan->plan()}}

                </div>
            </div>

            <div class="col-sm-12 visible-xs">
                <div class="sits-area--mobile">
                    <div class="sits-area--mobile-wrap">
                        <div class="sits-select">
                            <select name="sorting_item" class="sits__sort sit-row"
                                    tabindex="0">
                                <option value="1" selected='selected'>A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                <option value="6">F</option>
                                <option value="7">G</option>
                                <option value="8">I</option>
                                <option value="9">J</option>
                                <option value="10">K</option>
                                <option value="11">L</option>
                            </select> <select name="sorting_item"
                                              class="sits__sort sit-number" tabindex="1">
                                <option value="1" selected='selected'>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select> <a href="#" class="btn btn-md btn--warning toogle-sits">Choose
                                sit</a>
                        </div>
                    </div>

                    <a href="#" class="watchlist add-sits-line">Add new sit</a>

                    <aside class="sits__checked">
                        <div class="checked-place">
                            <span class="choosen-place"></span>
                        </div>
                        <div class="checked-result">$0</div>
                    </aside>

                    <img alt="" src="images/components/sits_mobile.png">
                </div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>


    <form id='film-and-time' class="booking-form" method='post'
          action='{{route('step3')}}'>
        {{ csrf_field() }}
        <input type='text' name='choosen-number' class="choosen-number"> <input
                type='text' name='choosen-number--cheap' class="choosen-number--cheap">
        <input type='text' name='choosen-number--middle'
               class="choosen-number--middle"> <input type='text'
                                                      name='choosen-number--expansive'
                                                      class="choosen-number--expansive"> <input
                type='text' name='choosen-cost' class="choosen-cost"> <input
                type='text' name='choosen-sits' class="choosen-sits">


        <div class="booking-pagination booking-pagination--margin">
            <a href="book1.php" class="booking-pagination__prev"> <span
                        class="arrow__text arrow--prev">prev step</span> <span
                        class="arrow__info">what&amp;where&amp;when</span>
            </a> <a href="#" class="booking-pagination__next"
                    onclick="document.getElementById('film-and-time').submit()"> <span
                        class="arrow__info">checkout</span>
            </a>
        </div>
    </form>

@endsection