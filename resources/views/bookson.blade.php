@extends('layouts.layout');
@section('arama')
    @include('search')
@endsection
@section('container')
    <!-- Main content -->

    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="images/tickets.png">
                <p class="order__title">Teşekkür ederiz <br><span class="order__descript">Biletinizi hazırladık</span></p>
            </div>

            <div class="ticket">
                <div class="ticket-position">
                    <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">SİNAMUR ONLINE</div> </div>
                    <div class="ticket__inner">

                        <div class="ticket-secondary">
                            <span class="ticket__item">Bilet No <strong class="ticket__number">{{$bilet->bilet_no}}</strong></span>
                            <span class="ticket__item">Barkod <strong class="ticket__number">{{$bilet->barkod}}</strong></span>
                            <span class="ticket__item ticket__date">{{$bilet->seans_tarihi}}</span>
                            <span class="ticket__item ticket__time">{{$bilet->saat}}</span>
                            <span class="ticket__item">Cinema: <span class="ticket__cinema">Cineworld</span></span>
                            <span class="ticket__item">Hall: <span class="ticket__hall">Visconti</span></span>
                            <span class="ticket__item ticket__price">Ücret: <strong class="ticket__cost">{{$bilet->toplam_tutar}} TL</strong></span>
                        </div>

                        <div class="ticket-primery">
                            <span class="ticket__item ticket__item--primery ticket__film">Filim<br><strong class="ticket__movie">{{$bilet->filim_adi}}</strong></span>
                            <span class="ticket__item ticket__item--primery">Koltuklar: <span class="ticket__place">{{$bilet->koltuklar}}</span></span>
                        </div>


                    </div>
                    <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">Online Bilet</div></div>
                </div>
            </div>

            <div class="ticket-control">
                <a href="#" class="watchlist list--download">Email'e göder</a>
                <a href="#" class="watchlist list--print">Yazdır</a>
            </div>

        </div>
    </section>

    <div class="clearfix"></div>
    @endsection