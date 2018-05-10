@component('mail::message')
Anda menerima Laporan Baru dari {!! $laporan->profiles->username !!}

Perkara     : {!! $laporan->perkaras->nama !!} <br>
Lokasi      : {!! $laporan->tempat_kejadian !!} <br>
Tanggal     : {!! $laporan->waktu_lapor !!}

@component('mail::button', ['url' => 'https://pilihkamar.com/pk/laporans/'.$laporan->id.''])
Cek Laporan
@endcomponent

Selamat Bekerja,<br>
{{ config('app.name') }}
@endcomponent
