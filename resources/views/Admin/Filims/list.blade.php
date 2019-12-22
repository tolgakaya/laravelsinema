@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Fillim Listesi
                <small>Responsive tables</small>
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-12">

        <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="{{route('adminfilimsearch')}}" method="post">
                        <div class="input-group custom-search-form">
                            {{ csrf_field() }}
                            <input type="text" name="arama_terimi" class="form-control" placeholder="Ara..."/>
                            <span class="input-group-btn">
                      <button id="btnARA" class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>

                    </span>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>İşlem</th>
                                <th>ID</th>
                                <th>ADI</th>
                                <th>Oyuncular</th>
                                <th>Ülke</th>
                                <th>Yıl</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($filimler as $filim)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="{{route('adminfilimshow',['movie_id'=>$filim->movie_id])}}">Düzenle</a>
                                        <a href="{{route('galeri',['movie_id'=>$filim->movie_id])}}">Galeri</a>
                                        <a href="{{route('adminseanslistfilim',['movie_id'=>$filim->movie_id])}}">Seans</a>
                                        <a href="{{route('filimfiyatshow',['movie_id'=>$filim->movie_id])}}">Fiyat</a>
                                        <a href="{{route('toplufiyatshow',['movie_id'=>$filim->movie_id])}}">Toplu Fiyat</a>
                                    </td>
                                    <td>{{$filim->movie_id}}</td>
                                    <td>{{$filim->adi}}</td>
                                    <td>{{$filim->oyuncular}}</td>
                                    <td class="center">{{$filim->ulke}}</td>
                                    <td class="center">{{$filim->yil}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div>{{$filimler->links()}}</div>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
@endsection
