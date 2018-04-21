@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Profile</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($profile != NULL)

                    <h4 class="text-success">Data Anda akan segera diverifikasi oleh Admin</h4>
                    {!! Form::model($profile, ['route' => ['profiles.update', $profile->id], 'method' => 'patch']) !!}

                        @include('profiles.fields')

                    {!! Form::close() !!}
                @else
                    @include('adminlte-templates::common.errors')

                    {!! Form::open(['route' => 'profiles.store', 'files' => true]) !!}

                        @include('profiles.fields')

                    {!! Form::close() !!}
                @endif
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

