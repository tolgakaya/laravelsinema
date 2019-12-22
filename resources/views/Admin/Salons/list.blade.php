@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Salon Listesi
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
                        <a class="btn btn-primary" href="{{route('saloncreate')}}"><i
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
                            @foreach($salonlar as $salon)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="{{route('adminsalonshow',['salon_id'=>$salon->salon_id])}}">Düzenle</a>
                                        <a href="{{route('adminseanslistsalon',['salon_id'=>$salon->salon_id])}}">Seanslar</a>
                                    </td>
                                    <td>{{$salon->salon_id}}</td>
                                    <td>{{$salon->salon_adi}}</td>
                                    <td>{{$salon->aciklama}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div>{{$salonlar->links()}}</div>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
@endsection
