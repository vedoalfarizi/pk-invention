@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Laporans</h1>
        <h1 class="pull-right">
           {{--<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('laporans.create') !!}">Add New</a>--}}
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">


                <form action="{{url('/pelaporans/cari')}}" method="get" class="col-md-3 pull-right">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Cari No surat / pelapor ..."/>
                        <span class="input-group-btn">
                            <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <form action="{{url('/pelaporans/cariPerkara')}}" method="get" class="col-md-3 pull-right">
                    <div class="input-group">
                        <select class="form-control" name="cari">
                            <option value="0" disabled="true" selected="true">--- Pilih Perkara---</option>
                            @php $perkaras = \App\Models\perkara::all()@endphp
                            @foreach($perkaras as $perkara)
                                <option value="{{$perkara->id}}">{{$perkara->nama}}</option>
                                @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>



                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Laporan Diterima</a></li>
                    <li><a data-toggle="tab" href="#menu1">Laporan Ditolak</a></li>
                    {{--<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>--}}
                    {{--<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>--}}
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Laporan Diterima</h3>
                        @include('admin.pelaporans.table_terima')
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>Laporan Ditolak</h3>
                        @include('admin.pelaporans.table_tolak')
                    </div>

                </div>
            </div>


            </div>
        </div>
        <div class="text-center">

        </div>
@endsection




