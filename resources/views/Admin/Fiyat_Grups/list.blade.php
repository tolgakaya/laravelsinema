@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Fiyat Grup Listesi

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
                        <a class="btn btn-primary" href="{{route('grupcreate')}}"><i
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
                                <th>Adı</th>
                                <th>Açıklama</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gruplar as $grup)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="{{route('admingrupshow',['grup_id'=>$grup->grup_id])}}">Düzenle</a>

                                    </td>
                                    <td>{{$grup->grup_id}}</td>
                                    <td>{{$grup->grup_adi}}</td>
                                    <td>{{$grup->aciklama}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div>{{$gruplar->links()}}</div>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
@endsection
