@extends('report')

@section('content')
  <div class="row">
    <div class='col-12'>
      <table class="table data-table">
        <thead>
          <tr>
            <th class="index">No</th>
            <th class='name'>Name</th>
            <th class='birth_date'>Data Nascimento</th>
            <th class='course'>Curso</th>
            <th class='teacher'>Professor</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $s)
            <tr>
              <td class="index">{{ $s->id }}</td>
              <td class='name'>{{ $s->name }}</th>
              <td class="birth_date">{{ date("d/m/Y", strtotime($s->birth_date))}}</td>
              <td class='course'>{{ $s->course->name }}</th>
              <td class='teacher'>{{ $s->course->teacher->name }}</th>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop

