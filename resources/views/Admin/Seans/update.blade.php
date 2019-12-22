@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Seans Bilgileri
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
                          action="{{route('adminseansupdate',['seans_id'=>$seans->seans_id])}}">
                        <div class="form-group">

                            <select name="salon_id" class="form-control">
                                <option value="-1">Salon seçiniz</option>
                                @foreach($salonlar as $salon)
                                    <option {{$seans->salon_id == $salon->salon_id ? "selected='selected'" :""}}
                                            value="{{$salon->salon_id}}">{{$salon->salon_adi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="movie_id" class="form-control">
                                <option value="-1">Filim Seçiniz</option>
                                @foreach($filimler as $filim)
                                    <option {{$seans->movie_id == $filim->movie_id ? "selected='selected'" :""}}
                                            value="{{$filim->movie_id}}">{{$filim->adi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="bitis_tarihi">Bitiş Tarihi</label>
                                <input type='text' class="form-control tarihinput" name="bitis_tarihi" id="bitis_tarihi"
                                       value="{{date_format(new DateTime($seans->bitis_tarihi),'d-m-Y')}}"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="saat">Seans Saati</label>
                                <input type='text' class="form-control" name="saat" id="saat" value="{{$seans->saat}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="standart_fiyat">Standart Fiyat</label>
                                <input type="text" class="form-control" name="standart_fiyat" id="standart_fiyat"
                                       value="{{$seans->standart_fiyat}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="hafta_sonu_fiyati">Standart Fiyat</label>
                                <input type="text" class="form-control" name="hafta_sonu_fiyati" id="hafta_sonu_fiyati"
                                       value="{{$seans->hafta_sonu_fiyati}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="fix_fiyat">Herkese aynı fiyat</label>
                                <input type="checkbox"
                                       {{$seans->fix_fiyat==1 ? "checked='checked'":""}}  class="form-control"
                                       name="fix_fiyat" id="fix_fiyat"/>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-default">Kaydet</button>
                        <button type="reset" class="btn btn-default">Temizle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection