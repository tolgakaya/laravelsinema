@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Seans Listesi
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group  pull-right">
                        <a class="btn btn-primary" href="{{route('seanscreate')}}"><i
                                    class='fa fa-cog icon-2x'>Ekle</i></a>

                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>İşlem</th>
                                <th>ID</th>
                                <th>Salon</th>
                                <th>Filim</th>
                                <th>Bitiş</th>
                                <th>Saat</th>
                                <th>Fiyat</th>
                                <th>Tarife</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seanslar as $seans)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="{{route('adminseanshow',['seans_id'=>$seans->seans_id])}}">Düzenle</a>
                                        <a href="{{route('tekseansfiyatshow',['seans_id'=>$seans->seans_id])}}">Fiyatlar</a>
                                        <a href="{{route('biletseans',['seans_id'=>$seans->seans_id])}}">Biletler</a>
                                    </td>
                                    <td>{{$seans->seans_id}}</td>
                                    <td>{{$seans->salon_adi}}</td>
                                    <td>{{$seans->adi}}</td>
                                    <td>{{date_format(new DateTime($seans->bitis_tarihi),'d-m-Y')}}</td>
                                    <td>{{$seans->saat}}</td>
                                    <td>{{$seans->standart_fiyat}}</td>
                                    <td>{{$seans->fix_fiyat==1? 'Fix' :'Tarifeli'}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div>{{$seanslar->links()}}</div>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
@endsection
