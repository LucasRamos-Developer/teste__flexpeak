@extends('application')

@section('title', 'Dashboard')

@section('content')
  @if(session()->get('alert'))
    <?php $alert = session()->get('alert'); ?>
    <div class="alert alert-{{ $alert['type'] }} shadow">
      {{ $alert['msg'] }}  
    </div>
  @endif
  <div class="row">
    <div class='col-12'>
      <!-- Earnings (Monthly) Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 ">Lista de Professores
          <span class='pull-right'>
            <a href="#" class='btn btn-card' @click="showModal = true">Adicionar Novo</a>
          </span>
          </h6>
        </div>
        <div class="card-body">
          <table class="table data-table">
            <thead>
              <tr>
                <th class="index">No</th>
                <th>Name</th>
                <th class='birth_date'>Data Nascimento</th>
                <th width="160px" class='actions'>Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $t)
                <tr>
                    <td class="index">{{ $t->id }}</td>
                    <td>{{ $t->name }}</td>
                    <td class="birth_date">{{ date("d/m/Y", strtotime($t->birth_date))}}</td>
                    <td  class='actions'>
                      <span class='inline'>
                        <a href="{{ route('teachers.edit', $t->id)}}" class="btn btn-primary">Edit</a>
                      </span>
                      <!--
                      <span>
                          <a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este item?')" href="{{ route('teachers.destroy', $t->id) }}"><i class="fa fa-trash"></i></a>
                      </span>
                      -->
                      <span class='inline'>
                        <form action="{{ route('teachers.destroy', $t->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                      </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <modal v-if="showModal" @close="showModal = false">
    <h3 slot="header">Adicionar Novo Professor</h3>
    <div slot='body'>
      {{ Form::open(['route' => 'teachers.store']) }}
        @include('teacher.form')
      {{ Form::close() }}
    </div>
  </modal>

@stop

