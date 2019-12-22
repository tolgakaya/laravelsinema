@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Yeni Filim
                <small>Filminizi tanımlayın.</small>
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

                    <form role="form" method="post" action="{{route('adminfilimkaydet')}}">
                        <div class="form-group">
                            <label>Filmin Adı</label>
                            <input name='adi' class="form-control" placeholder="filim adı" value="{{ old('adi') }}">

                        </div>
                        <div class="form-group">
                            <label>Yönetmen</label>
                            <input name="yonetmen" class="form-control" placeholder="Yönetmen adını giriniz" value="{{ old('yonetmen') }}">
                        </div>
                        <div class="form-group">
                            <label>Oyuncular</label>
                            <input name="oyuncular" class="form-control" placeholder="Oyuncu isimlerini giriniz" value="{{ old('oyuncular') }}">
                        </div>
                        <div class="form-group">
                            <label>Filmin konusu</label>
                            <textarea name="konu" class="form-control" rows="8" value="{{ old('konu') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ülke</label>
                            <input name="ulke" class="form-control" placeholder="Ülke  giriniz" value="{{ old('ulke') }}">
                        </div>
                        <div class="form-group">
                            <label>Yaş sınırı</label>
                            <input name="yas_siniri" class="form-control" placeholder="Yaş sınırı giriniz" value="{{ old('yas_siniri') }}">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input name="kategori" class="form-control" placeholder="Filim kategorisi giriniz" value="{{ old('kategori') }}">
                        </div>
                        <div class="form-group">
                            <label>Yapım Yılı</label>
                            <input name="yil" class="form-control" placeholder="Yapım yılı giriniz" value="{{ old('yil') }}">
                        </div>
                        <div class="form-group">
                            <label>Süresi</label>
                            <input name="suresi" class="form-control" placeholder="Filmin süresi(dak)" value="{{ old('adi') }}">
                        </div>


                        <div class="form-group">
                            <label>Programın durumu</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gelgors" id="optionsRadios1" value="gosterimde"
                                           checked="">Gösterimde
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gelgors" id="optionsRadios2"
                                           value="gelecek">Gelecek program
                                </label>
                            </div>
                            {{ csrf_field() }}
                        </div>

                        <button type="submit" class="btn btn-default">Kaydet</button>
                        <button type="reset" class="btn btn-default">Temizle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection