@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Bilet Listesi
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
                    <form action="{{route('biletara')}}" method="post">

                        <input type="hidden" name="seans_id" value="{{ $seans_id or ''}}">
                        <div class="input-group custom-search-form">
                            {{ csrf_field() }}
                            <label for="tarih">Tarih Seçiniz</label>
                            <input type='text'   class="form-control tarihinput" name="tarih" id="tarih" />

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
                                <th>Seans ID</th>
                                <th>Seans Tarihi</th>
                                <th>Koltuklar</th>
                                <th>Müşteri Adı</th>
                                <th>Toplam Tutar</th>
                                <th>İptal</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($biletler as $bilet)
                                <tr class="odd gradeX">
                                    <td>
                                        <a href="{{route('biletsil',['bilet_id'=>$bilet->bilet_id])}}">Sil</a>
                                        <a href="{{route('biletshow',['bilet_id'=>$bilet->bilet_id])}}">Göster</a>
                                    </td>
                                    <td>{{$bilet->bilet_id}}</td>
                                    <td>{{$bilet->seans_id}}</td>
                                    <td>{{date_format(new DateTime($bilet->seans_tarihi),'d-m-Y')}}</td>
                                    <td>{{$bilet->koltuk}}</td>
                                    <td>{{$bilet->musteri_adi}}</td>
                                    <td>{{$bilet->toplam_tutar}}</td>
                                    <td>{{$bilet->iptal==1? 'IPTAL' :''}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div>{{$biletler->links()}}</div>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
@endsection
