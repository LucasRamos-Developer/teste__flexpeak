@extends('application')

@section('title', 'Editar Aluno')

@section('content')
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <!-- Earnings (Monthly) Card Example -->
      <div class="card shadow mb-4 inner">
        <div class="card-header py-3">
          <h6 class="m-0">
            Editar Aluno
          </h6>
        </div>
        <div class="card-body">
          {{ Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'PUT'] ) }}
            @include('student.form')
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@stop




