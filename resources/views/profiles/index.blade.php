@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Profile</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                {!! Form::open(['route' => 'profiles.store', 'files' => true]) !!}

                @include('profiles.fields')

                {!! Form::close() !!}

            </div>
        </div>
        <div class="text-center">

        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myDate").required;
            document.getElementById("demo").innerHTML = x;
        }
    </script>
@endsection

