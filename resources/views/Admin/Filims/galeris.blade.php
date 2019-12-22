@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Filme ait resim ve video galerisi
                <small>Her türlü medya işlemleri</small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="btn-group  pull-right">
                <a class="btn btn-primary" href="{{route('galeriform',['movie_id'=>$movie_id])}}"><i
                            class='fa fa-cog icon-2x'>Ekle</i></a>

            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Filim Fotoğrafları
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

                    @foreach($medias as $media)
                        <div class="col-lg-3">
                            <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
                                <img alt="poster" src="/Medias/Movie/{{$media->adi}}">
                                <div class="caption">
                                    <form action="{{route('resimupdate',['meadia_id'=>$media->media_id])}}" method="post">
                                        <div class="form-group">
                                            {{csrf_field()}}
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="tek" {{$media->tek == 1 ? "checked='checked'": '' }}>Tek
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="poster" {{$media->poster == 1 ? "checked='checked'": '' }}>Pos
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="galeri" {{$media->galeri == 1 ? "checked='checked'": '' }}>Gal
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="galeri"   {{$media->video == 1 ? "checked='checked'": "disabled='disabled'" }}>Vid
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-small">Kaydet</button>
                                        <!--Buraya resmin durumunun kaydedileceği bir form ekleyek -->
                                    </form>
                                    <a href="{{URL::route('resimsil',['galeri_id'=>$media->media_id])}}"
                                       onclick="return confirm('Emin misiniz?')">
                                        <button type="submit" class="btn btn-danger btn-small">Sil</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>


@endsection