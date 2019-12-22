@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
               Fiyat Grup Bilgileri

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

                    <form role="form" method="post" action="{{route('admingrupupdate',['grup_id'=>$grup->grup_id])}}">
                        <div class="form-group">
                            <label>Grup Adı</label>
                            <input name='grup_adi' class="form-control" value="{{ $grup->grup_adi}}">

                        </div>
                        <div class="form-group">
                            <label>Grup Açıklaması</label>
                            <input name="aciklama" class="form-control"  value="{{ $grup->aciklama }}">
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