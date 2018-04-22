@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pengguna
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pengguna, ['route' => ['perkaras.update', $pengguna->id], 'method' => 'patch']) !!}

                        @include('pengguna.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection