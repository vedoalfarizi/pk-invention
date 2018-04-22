@extends('app')

@section('content')
    <div class="space-medium">
        <div class="container">
            @if($mesage=='berhasil')
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses!</strong> {{$isi_mesage}}
            </div>
            @elseif($mesage=='gagal')
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Gagal!</strong>
            </div>
            @endif

            <div class="row">

                <div class="col-lg-3">
                    <h3>Selamat Datang, <small>{{auth::user()->name}}</small></h3>
                    <p>{{auth::user()->email}}</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="tab" href="#Beranda">Beranda</a></li>
                        <li><a data-toggle="tab" href="#laporan">laporan</a></li>
                        <li><a data-toggle="tab" href="#profil">profil</a></li>
                    </ul>
                </div>
                <div class="col-lg-9">

                     <div class="tab-content">
                            <div id="Beranda" class="tab-pane fade in active">
                                @include('user.profil.info')
                            </div>
                            <div id="laporan" class="tab-pane fade">
                                @include('user.profil.laporan')
                            </div>
                            <div id="profil" class="tab-pane fade">
                                @include('user.profil.profil')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection

