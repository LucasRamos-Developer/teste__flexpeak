
  <div class='form-wrap'>
    <div class='row'>
      <div class='col-8'>
        {{ Form::label('name', 'Nome Completo', array('class' => 'form-label')) }}
        {{ Form::text('name', $student->name, array('class' => 'form-control', 'required' => true)) }}
      </div>
      <div class='col-4'>
        {{ Form::label('birth_date', 'Data de Nascimento', array('class' => 'form-label')) }}
        {{ Form::text('birth_date', date("d/m/Y", strtotime($student->birth_date)), array('class' => 'form-control')) }}
      </div>
      <div class='col-3'>
        {{ Form::label('address_zipcode', 'CEP', array('class' => 'form-label')) }}
        {{ Form::text('address_zipcode', $student->address_zipcode, array('class' => 'form-control')) }}
      </div>
      <div class='col-7'>
        {{ Form::label('address_street', 'Rua', array('class' => 'form-label')) }}
        {{ Form::text('address_street', $student->address_street, array('class' => 'form-control')) }}
      </div>
      <div class='col-2'>
        {{ Form::label('address_number', 'No.', array('class' => 'form-label')) }}
        {{ Form::text('address_number', $student->address_number, array('class' => 'form-control')) }}
      </div>
      <div class='col-4'>
        {{ Form::label('address_neighborhood', 'Bairro', array('class' => 'form-label')) }}
        {{ Form::text('address_neighborhood', $student->address_neighborhood, array('class' => 'form-control')) }}
      </div>
      <div class='col-4'>
        {{ Form::label('address_city', 'Cidade', array('class' => 'form-label')) }}
        {{ Form::text('address_city', $student->address_city, array('class' => 'form-control')) }}
      </div>
      <div class='col-4'>
        {{ Form::label('address_state', 'Estado', array('class' => 'form-label')) }}
        {{ Form::text('address_state', $student->address_state, array('class' => 'form-control')) }}
      </div>
      <div class='col-12 m-0'>
        <div class='legend'>
          <span>Dados do Curso</span>
        </div>
      </div>
      <div class='col-12'>
        {{ Form::label('course_id', 'Curso', array('class' => 'form-label')) }}
        {{ Form::select('course_id', $courses, $student->course_id, array('class' => 'form-control')) }}
      </div>
    </div>
    <div class='form-footer'>
      <div class="row justify-content-end">
        <div class='col-md-2 m-0'>
          <a type="submit" href="/students" class='btn btn-cancel'>Cancelar</a>
        </div>
        <div class='col-md-2 m-0'>
          <button type="submit" class='btn btn-submit'>Salvar</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function() {
      $('#birth_date').mask('00/00/0000');
      $('#address_zipcode').mask('00.000-000');
      Utility.address_by_cep($('#address_zipcode'));
    });  
  </script>