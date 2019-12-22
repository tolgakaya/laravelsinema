@extends('layouts.layout');
@section('arama')
    @include('search')
@endsection
@section('container')
    <div class="order-container">
        <div class="order">

            <div class="order__control">
                <a href="" class="order__control-btn active">Purchase</a> <a
                        href="book3-reserve.html" class="order__control-btn">Reserve</a>
            </div>
        </div>
    </div>
    <div class="order-step-area">
        <div class="order-step first--step order-step--disable ">1. Seans Seçimi</div>
        <div class="order-step second--step order-step--disable">2. Koltuk Seçimi</div>
        <div class="order-step third--step">3. Ödemet</div>
    </div>

    <div class="col-sm-12">
        <select id="grupselect" data-value="{{csrf_token()}}">
            <option value="-1">Bilet Tipi Seçiniz</option>
            <option value="-11">Standart</option>
            @foreach($gruplar as $l)
                <option value="{{$l->grup_id}}">{{$l->grup_adi}}</option>
            @endforeach
        </select>

        <input type="hidden" name="csrf" id="csrf" value="{{csrf_token()}}">
        <div id="fiyatdiv">{{$bilet->toplam_tutar}}</div>
        <div class="checkout-wrapper">
            <h2 class="page-heading">price</h2>
            <ul class="book-result">
                <li class="book-result__item">Tickets: <span
                            class="book-result__count booking-ticket">3</span></li>
                <li class="book-result__item">One item price: <span
                            class="book-result__count booking-price">$20</span></li>
                <li class="book-result__item">Tutar: <span
                            class="book-result__count booking-cost">{{$bilet->toplam_tutar}}</span></li>
            </ul>


            <h2 class="page-heading">Ödeme Bilgileri</h2>

            <form class="form col-xs-6" method='post' action="{{route('bilet')}}" class="form contact-info">
                {{ csrf_field() }}
                <input type='hidden' name='tahsilat_turu' value="Kart">
                <input type='hidden' name='rezervasyon_bilet' value="Bilet">
                <input type='text' name='kart_no' placeholder='Kart No:'
                       class="form__mail">

                <input type='text' name='kart_adi' placeholder='Kartın Üzerindeki İsim'
                       class="form__mail">
                <input type='text' name='ccv' placeholder='Kartın arkasındaki güvenlik kodu'
                       class="form__mail">

                <input type='text' name='son_kullanma_tarihi' placeholder='Son kullanma tarihi'
                       class="form__mail">

                <div class="contact-info__field contact-info__field-tel">
                    <input type='text' name='musteri_adi' placeholder='İsminiz'
                           class="form__mail">
                </div>
                <div class="contact-info__field contact-info__field-tel">
                    <input type='email' name='musteri_email' placeholder='EPosta adresiniz'
                           class="form__mail">
                </div>
                <div class="contact-info__field contact-info__field-tel">
                    <input type='tel' name='musteri_telefonu' placeholder='Phone number'
                           class="form__mail">
                </div>
                <div class="order">
                    <input type="submit" class="btn btn-md btn--warning btn--wide" value="Ödeme Yap" >
                </div>
            </form>


        </div>


    </div>
@endsection