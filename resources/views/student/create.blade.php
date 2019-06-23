@extends('application')

@section('title', 'Adicionar Novo Professor')

@section('content')
  <div class="row">
      <div class="col-md-8 offset-md-2">
      <!-- Earnings (Monthly) Card Example -->
      <div class="card shadow mb-4 inner" >
        <div class="card-header py-3">
          <h6 class="m-0">
            Adicionar Novo Aluno
          </h6>
        </div>
        <div class="card-body">
          {{ Form::open(['route' => 'students.store']) }}
            @include('student.form')
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@stop

