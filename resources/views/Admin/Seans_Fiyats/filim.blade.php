@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Seans Fiyat Bilgileri
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="panel-body">

                    <form role="form" method="post"
                          action="{{route('fiyatfilimkaydet',['movie_id'=>$movie_id])}}">
                        <input name="adet" type="hidden" value="{{count($seanslar)}}">
                        @for($i=0; $i<count($seanslar);$i++)
                            <div class="form-group">
                                <!-- buraya seans adını çekip yazdıracaz -->
                                <h2><label class="label label-info">{{$seanslar[$i]['saat']}}</label></h2>
                                <input name="{{$i}}[seans_id]" type="hidden" value="{{$seanslar[$i]['seans_id']}}">
                            </div>



                            @forelse($seanslar[$i]['seans_fiyat'] as $fiyat)
                                <!--Silme butonu koyalım -->
                                    <a href="{{route('fiyatsil',['fiyat_id'=>$fiyat['fiyat_id']])}}"><button type="button" class="btn btn-sm btn-danger">Sil</button> </a>
                                <h3><label class="label label-warning">Grup: {{ $gruplar->where('grup_id',$fiyat['grup_id'])->first()['grup_adi']}}</label></h3>
                                <input name="{{$i}}[{{$fiyat['grup_id']}}][fiyat_id]" type="hidden"
                                       value="{{$fiyat['fiyat_id']}}">
                                <div class="form-group">
                                    <label for="standart_fiyat">Standart Fiyat</label>
                                    <input type="text" class="form-control"
                                           name="{{$i}}[{{$fiyat['grup_id']}}][standart_fiyat]"
                                           id="standart_fiyat" value="{{$fiyat['standart_fiyat']}}"/>
                                </div>
                                    <div class="form-group">
                                        <label for="hafta_sonu_fiyati">Hafta Sonu Fiyatı</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$fiyat['grup_id']}}][hafta_sonu_fiyati]"
                                               id="hafta_sonu_fiyati" value="{{$fiyat['hafta_sonu_fiyati']}}"/>
                                    </div>
                                <div class="form-group">
                                    <label for="iskonto_orani">İskonto Oranı %</label>
                                    <input type="text" class="form-control"
                                           name="{{$i}}[{{$fiyat['grup_id']}}][iskonto_orani]"
                                           id="iskonto_orani" value="{{$fiyat['iskonto_orani']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="sabit_fiyat">Sabit Fiyat</label>
                                    <input type="text" class="form-control"
                                           name="{{$i}}[{{$fiyat['grup_id']}}][sabit_fiyat]"
                                           id="sabit_fiyat" value="{{$fiyat['sabit_fiyat']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="bilet_adedi">Bilet Adedi</label>
                                    <input type="text" class="form-control"
                                           name="{{$i}}[{{$fiyat['grup_id']}}][bilet_adedi]"
                                           id="bilet_adedi" value="{{$fiyat['bilet_adedi']}}"/>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="bitis_tarihi">Gecerlilik Tarihi</label>
                                        <input type='text' class="form-control tarihinput"
                                               name="{{$i}}[{{$fiyat['grup_id']}}][gecerlilik_tarihi]"
                                               id="bitis_tarihi"
                                               value="{{date_format(new DateTime($fiyat['gecerlilik_tarihi']),'d-m-Y')}}"/>
                                    </div>
                                </div>

                            @empty
                            <!--Fiyat yokmuş boş form oluşturalım
Grup listesini al ve her grup için yukarıdakini tekrarla-->

                                @foreach($gruplar as $grup)
                                    <h3><label class="label label-warning">Grup: {{$grup['grup_adi']}}</label></h3>
                                    <input name="{{$i}}[{{$grup['grup_id']}}][grup_id]" type="hidden">
                                    <div class="form-group">
                                        <label for="standart_fiyat">Standart Fiyat</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$grup['grup_id']}}][standart_fiyat]"
                                               id="standart_fiyat"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="hafta_sonu_fiyati">Hafta Sonu Fiyat</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$grup['grup_id']}}][hafta_sonu_fiyati]"
                                               id="hafta_sonu_fiyati"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="iskonto_orani">İskonto Oranı %</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$grup['grup_id']}}][iskonto_orani]"
                                               id="iskonto_orani"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="sabit_fiyat">Sabit Fiyat</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$grup['grup_id']}}][sabit_fiyat]"
                                               id="sabit_fiyat"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="bilet_adedi">Bilet Adedi</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$grup['grup_id']}}][bilet_adedi]"
                                               id="bilet_adedi"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="bitis_tarihi">Gecerlilik Tarihi</label>
                                            <input type='text' class="form-control tarihinput"
                                                   name="{{$i}}[{{$grup['grup_id']}}][gecerlilik_tarihi]"
                                                   id="bitis_tarihi"
                                            />
                                        </div>
                                    </div>

                                @endforeach

                            @endforelse

                            @if(count($seanslar[$i]['seans_fiyat'])>0)

                            <!-- Buraya eğer fiyat tanımlanmamış grup varsa formu-->
                                @foreach($fiyatsizlar[$seanslar[$i]['seans_id']] as $e)
                                    <h3><label class="label label-warning">Grup: {{$gruplar->where('grup_id',$e)->first()['grup_adi']}}</label></h3>
                                    <input name="{{$i}}[{{$e}}]" type="hidden" value="{{$e}}">
                                    <div class="form-group">
                                        <label for="standart_fiyat">Standart Fiyat</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$e}}][standart_fiyat]"
                                               id="standart_fiyat"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="hafta_sonu_fiyati">Hafta Sonu Fiyat</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$e}}][hafta_sonu_fiyati]"
                                               id="hafta_sonu_fiyati"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="iskonto_orani">İskonto Oranı %</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$e}}][iskonto_orani]"
                                               id="iskonto_orani"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="sabit_fiyat">Sabit Fiyat</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$e}}][sabit_fiyat]"
                                               id="sabit_fiyat"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="bilet_adedi">Bilet Adedi</label>
                                        <input type="text" class="form-control"
                                               name="{{$i}}[{{$e}}][bilet_adedi]"
                                               id="bilet_adedi"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="bitis_tarihi">Gecerlilik Tarihi</label>
                                            <input type='text' class="form-control tarihinput"
                                                   name="{{$i}}[{{$e}}][gecerlilik_tarihi]"
                                                   id="bitis_tarihi"/>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endfor

                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default">Kaydet</button>
                        <button type="reset" class="btn btn-default">Temizle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection