@extends('application')

@section('title', 'Adicionar Novo Curso')

@section('content')
  <div class="row">
      <div class="col-md-8 offset-md-2">
      <!-- Earnings (Monthly) Card Example -->
      <div class="card shadow mb-4 inner" >
        <div class="card-header py-3">
          <h6 class="m-0">
            Adicionar Novo Curso
          </h6>
        </div>
        <div class="card-body">
          {{ Form::open(['route' => 'courses.store']) }}
            @include('course.form')
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@stop

