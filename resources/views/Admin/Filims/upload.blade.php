@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Medya Yükleme Ekranı
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="btn-group  pull-right">
                <a class="btn btn-primary" href="{{route('galeriform',['movie_id'=>$movie_id])}}"><i class='fa fa-cog icon-2x' >Ekle</i></a>

            </div>
            <div class="panel panel-success">
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

                    <form name="createnewalbum" method="POST" action="{{URL::route('upload',['movie_id'=>$movie_id])}}" enctype="multipart/form-data">
                        <fieldset>
                            {{ csrf_field() }}
                            <div class="form-group">

                                <div class="checkbox">
                                    <label>
                                        <input name="tek" type="checkbox" >Tek sayfa resmi
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="poster" type="checkbox" >Poster resmi
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="galeri" type="checkbox" >Galeri resmi
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="tumb" type="checkbox" >Video kapak resmi
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url">Video adresi</label>
                                <input name="url" type="url" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="adi">Bir resim yükleyin</label>
                                <input name="adi" type="file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-default">Create!</button>
                        </fieldset>
                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection