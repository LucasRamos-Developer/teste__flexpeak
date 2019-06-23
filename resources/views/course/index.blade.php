@extends('application')

@section('title', 'Dashboard')

@section('content')
  @if(session()->get('alert'))
    <?php $alert = session()->get('alert'); ?>
    <div class="alert alert-{{ $alert['type'] }} shadow">
      {{ $alert['msg'] }}
      <span class="btn-close" onclick="$(this).parent().fadeOut();">&times;</span> 
    </div>
  @endif
  <div class="row">
    <div class='col-12'>
      <!-- Earnings (Monthly) Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 ">Lista de Professores
            <span class='pull-right'>
              <a href="{{ route('courses.create') }}" class='btn btn-card'>Adicionar Novo</a>
            </span>
          </h6>
        </div>
        <div class="card-body">
          <table class="table data-table">
            <thead>
              <tr>
                <th class="index">No</th>
                <th class="name">Name</th>
                <th class='teacher_id'>Professor</th>
                <th width="160px" class='actions'>Ações</th>
              </tr>
            </thead>
            <tbody>
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop

@section('script-content')
  <script type="text/javascript">
    $( document ).ready(function() {
      Course.init_dataTable("{{route('courses.index')}}");
    });  
  </script>
@stop
