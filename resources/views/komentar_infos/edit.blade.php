@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Komentar Info
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($komentarInfo, ['route' => ['komentarInfos.update', $komentarInfo->id], 'method' => 'patch']) !!}

                        @include('komentar_infos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection