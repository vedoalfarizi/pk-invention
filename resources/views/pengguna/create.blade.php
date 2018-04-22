@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perkara
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'perkaras.store']) !!}

                        @include('perkaras.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
