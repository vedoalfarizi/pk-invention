@component('mail::message')
    Laporan yg anda laporkan pada : <br>
    waktu : {!! $laporan->waktu_lapor !!}<br>
    perkara : {!! $laporan->perkaras->nama !!} <br>
    <br>
    Telah ditindaklanjuti oleh kepolisian. <br>
    Silakan cek akun anda untuk melihat perkembangan laporan anda

@component('mail::button', ['url' => 'https://pilihkamar.com/pk/laporans/'.$laporan->id.''])
Cek Laporan
@endcomponent

Terima Kasih telah mempercayai kami,<br>
{{ config('app.name') }}
@endcomponent
