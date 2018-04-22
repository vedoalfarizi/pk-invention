<html>
{{--<body >--}}
<body onload="window.print()" style="margin-left: 15%; margin-right: 15%">
    <center><img src="{{url('images/logo_surat.png')}}" style="width: 10%">
    <h2><u>LAPORAN POLISI</u></h2>
    <h4 style="margin-top: -15px">Nomor : {{$laporan->no_surat}}</h4></center>

    <p>Yang bertanda tangan dibawah ini menerangkan bahwa pada hari Rabu tanggal {{substr($laporan->created_at,0,10)}} sekitar Jam {{substr($laporan->created_at,10,4)}}
        telah melakukan pelaporan melalui aplikasi Pantau Kriminal.</p>
</body>
</html>
<hr width="100%">
<h3><u>YANG MELAPOR :</u></h3>
<table class="table table-responsive" id="laporans-table">
    <tr>
        <td width="40%">Nama</td>
        <td>: {{$laporan->profiles->username}}</td>
    </tr>
    <tr>
        <td>Tempat, Tanggal lahir</td>
        <td>: {{$laporan->profiles->tempat_lahir}}, {{substr($laporan->profiles->tanggal_lahir,0,10)}}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin </td>
        <td>: @if($laporan->profiles->jekel==1)
                Laki - Laki
            @else Perempuan
            @endif</td>
    </tr>
    <tr>
        <td>Pekerjaan </td>
        <td>: {!! $laporan->profiles->pekerjaan !!}</td>
    </tr>
    <tr>
        <td>Alamat </td>
        <td>: {!! $laporan->profiles->alamat!!}</td>
    </tr>
    <tr>
        <td>No HP </td>
        <td>: {!! $laporan->profiles->no_hp!!}</td>
    </tr>
</table>
<hr width="100%">
<h3><u>HAL YANG DILAPORKAN :</u></h3>
<table class="table table-responsive" id="laporans-table">
    <tr>
        <td width="45%">Waktu Kejadian</td>
        <td>: </td><td>{!! $laporan->waktu_kejadian !!}</td>
    </tr>
    <tr>
        <td>Tempat Kejadian </td>
        <td>: </td><td>{!! $laporan->tempat_kejadian !!}</td>
    </tr>
    <tr>
        <td>Perkara </td>
        <td>: </td><td>{!! $laporan->perkaras->nama!!}</td>
    </tr>
    <tr>
        <td>Korban </td>
        <td>: </td><td><strong>{!! $laporan->korban !!}</strong></td>
    </tr>
    <tr>
        <td>Terlapor </td>
        <td>:</td><td> <strong>{!! $laporan->pelapor !!}</strong></td>
    </tr>
    <tr>
        <td>Alamat Korban</td>
        <td>: </td><td>{!! $laporan->alamat_korban !!}</td>
    </tr>
    <tr>
        <td>Kerugian </td>
        <td>: </td><td>{!! $laporan->kerugian !!}</td>
    </tr>

    <tr>
        <td>Saksi </td>
        <td>: </td><td>{!! $laporan->saksi !!}</td>
    </tr>
    <tr>
        <td>Dilaporkan pada </td>
        <td>: </td><td>{!! $laporan->created_at!!} WIB</td>
    </tr>
</table>
<hr width="100%">
<div class="col-md-12">
    <h3>URAIAN KEJADIAN </h3>
    <p>{!! $laporan->uraian_kejadian!!}</p>
</div>
<hr width="100%">
<div class="row" align="right">
    <div class="col-md-1 pull">
        Pelapor,
            <br><br>
            <br><br>
            {{$laporan->profiles->username}}
    </div>
</div>
