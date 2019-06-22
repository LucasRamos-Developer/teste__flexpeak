@extends('application')

@section('title', 'Adicionar Novo Professor')

@section('content')
  <div class="row">
    <div class='col-12'>
      <!-- Earnings (Monthly) Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0">
            Adicionar Novo Professor
          </h6>
        </div>
        <div class="card-body">
          {{ Form::open(['route' => 'teachers.store']) }}
            @include('teacher.form')
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@stop

