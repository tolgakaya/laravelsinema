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
                          action="{{route('fiyatupdate',['seans_id'=>$seans_id])}}">
                        <input name="adet" type="hidden" value="{{count($gruplar)}}">
                        @for($i=0; $i<count($gruplar);$i++)
                            <div class="form-group">
                                <h2><label class="label label-info">{{$gruplar[$i]['grup_adi']}}</label></h2>
                                <input name="{{$i}}[grup_id]" type="hidden" value="{{$gruplar[$i]['grup_id']}}">
                            </div>



                            @forelse($gruplar[$i]['seans__fiyat'] as $fiyat)
                                <input name="{{$i}}[fiyat_id]" type="hidden" value="{{$fiyat['fiyat_id']}}">
                                <div class="form-group">
                                    <label for="standart_fiyat">Standart Fiyat</label>
                                    <input type="text" class="form-control" name="{{$i}}[standart_fiyat]"
                                           id="standart_fiyat" value="{{$fiyat['standart_fiyat']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="hafta_sonu_fiyati">Hafta Sonu Fiyat</label>
                                    <input type="text" class="form-control" name="{{$i}}[hafta_sonu_fiyati]"
                                           id="hafta_sonu_fiyati" value="{{$fiyat['hafta_sonu_fiyati']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="iskonto_orani">İskonto Oranı %</label>
                                    <input type="text" class="form-control" name="{{$i}}[iskonto_orani]"
                                           id="iskonto_orani" value="{{$fiyat['iskonto_orani']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="sabit_fiyat">Sabit Fiyat</label>
                                    <input type="text" class="form-control" name="{{$i}}[sabit_fiyat]"
                                           id="sabit_fiyat" value="{{$fiyat['sabit_fiyat']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="bilet_adedi">Bilet Adedi</label>
                                    <input type="text" class="form-control" name="{{$i}}[bilet_adedi]"
                                           id="bilet_adedi" value="{{$fiyat['bilet_adedi']}}"/>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="bitis_tarihi">Gecerlilik Tarihi</label>
                                        <input type='text' class="form-control tarihinput" name="{{$i}}[gecerlilik_tarihi]"
                                               id="bitis_tarihi"
                                               value="{{date_format(new DateTime($fiyat['gecerlilik_tarihi']),'d-m-Y')}}"/>
                                    </div>
                                </div>

                            @empty
                            <!--Fiyat yokmuş boş form oluşturalım -->

                                <div class="form-group">
                                    <label for="standart_fiyat">Standart Fiyat</label>
                                    <input type="text" class="form-control" name="{{$i}}[standart_fiyat]"
                                           id="standart_fiyat"/>
                                </div>
                                <div class="form-group">
                                    <label for="hafta_sonu_fiyati">Hafta Sonu Fiyat</label>
                                    <input type="text" class="form-control" name="{{$i}}[hafta_sonu_fiyati]"
                                           id="hafta_sonu_fiyati"/>
                                </div>
                                <div class="form-group">
                                    <label for="iskonto_orani">İskonto Oranı %</label>
                                    <input type="text" class="form-control" name="{{$i}}[iskonto_orani]"
                                           id="iskonto_orani"/>
                                </div>
                                <div class="form-group">
                                    <label for="sabit_fiyat">Sabit Fiyat</label>
                                    <input type="text" class="form-control" name="{{$i}}[sabit_fiyat]"
                                           id="sabit_fiyat"/>
                                </div>
                                <div class="form-group">
                                    <label for="bilet_adedi">Bilet Adedi</label>
                                    <input type="text" class="form-control" name="{{$i}}[bilet_adedi]"
                                           id="bilet_adedi"/>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="bitis_tarihi">Gecerlilik Tarihi</label>
                                        <input type='text' class="form-control tarihinput" name="{{$i}}[gecerlilik_tarihi]"
                                               id="bitis_tarihi"
                                        />
                                    </div>
                                </div>
                            @endforelse
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