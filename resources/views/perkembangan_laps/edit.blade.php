@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perkembangan Lap
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perkembanganLap, ['route' => ['perkembanganLaps.update', $perkembanganLap->id], 'method' => 'patch']) !!}

                        @include('perkembangan_laps.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection