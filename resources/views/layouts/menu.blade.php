@if(Auth::user()->role == 1)

    @if(Auth::user()->status_verifikasi == 1)

        <li class="{{ Request::is('infos*') ? 'active' : '' }}">
            <a href="{!! route('infos.index') !!}"><i class="fa fa-edit"></i><span>Info dan Tips</span></a>
        </li>

        <li class="{{ Request::is('laporans*') ? 'active' : '' }}">
            <a href="{!! route('laporans.index') !!}"><i class="fa fa-edit"></i><span>Laporan</span></a>
        </li>

        <li class="{{ Request::is('perkembanganLaps*') ? 'active' : '' }}">
            <a href="{!! route('perkembanganLaps.index') !!}"><i class="fa fa-edit"></i><span>Perkembangan Laporan</span></a>
        </li>

    @endif

    {{--<li class="{{ Request::is('profiles*') ? 'active' : '' }}">--}}
        {{--<a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profil</span></a>--}}
    {{--</li>--}}

@elseif(Auth::user()->role == 0)
    <li class="{{ Request::is('home*') ? 'active' : '' }}">
        <a href="{!! url('/home') !!}"><i class="fa fa-edit"></i><span>Home</span></a>
    </li>
    <li class="{{ Request::is('pengguna*') ? 'active' : '' }}">
        <a href="{!! url('/pengguna') !!}"><i class="fa fa-edit"></i><span>Pengguna</span></a>
    </li>

    <li class="{{ Request::is('laporans*') ? 'active' : '' }}">
        <a href="{!! route('laporans.index') !!}"><i class="fa fa-edit"></i><span>Laporan</span></a>
    </li>
    <li class="{{ Request::is('pelaporans*') ? 'active' : '' }}">
        <a href="{!! url('/pelaporans') !!}"><i class="fa fa-edit"></i><span>Progres Pelaporan</span></a>
    </li>


    <li class="{{ Request::is('perkaras*') ? 'active' : '' }}">
        <a href="{!! route('perkaras.index') !!}"><i class="fa fa-edit"></i><span>Perkara</span></a>
    </li>


    <li class="{{ Request::is('perkembanganLaps*') ? 'active' : '' }}">
        <a href="{!! route('perkembanganLaps.index') !!}"><i class="fa fa-edit"></i><span>Perkembangan Laporan</span></a>
    </li>




    {{--<li class="{{ Request::is('feedbackInfos*') ? 'active' : '' }}">--}}
        {{--<a href="{!! route('feedbackInfos.index') !!}"><i class="fa fa-edit"></i><span>Feedback Infos</span></a>--}}
    {{--</li>--}}

    {{--<li class="{{ Request::is('komentarInfos*') ? 'active' : '' }}">--}}
        {{--<a href="{!! route('komentarInfos.index') !!}"><i class="fa fa-edit"></i><span>Komentar</span></a>--}}
    {{--</li>--}}

    <li class="{{ Request::is('infos*') ? 'active' : '' }}">
        <a href="{!! route('infos.index') !!}"><i class="fa fa-edit"></i><span>Info dan Tips</span></a>
    </li>


@endif



<li class="{{ Request::is('beritas*') ? 'active' : '' }}">
    <a href="{!! route('beritas.index') !!}"><i class="fa fa-edit"></i><span>Beritas</span></a>
</li>

