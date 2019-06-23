
  <div class='form-wrap'>
    <div class='row'>
      <div class='col-8'>
        {{ Form::label('name', 'Nome Completo', array('class' => 'form-label')) }}
        {{ Form::text('name', $teacher->name, array('class' => 'form-control', 'required' => true)) }}
      </div>
      <div class='col-4'>
        {{ Form::label('birth_date', 'Data de Nascimento', array('class' => 'form-label')) }}
        {{ Form::text('birth_date', date("d/m/Y", strtotime($teacher->birth_date)), array('class' => 'form-control')) }}
      </div>
    </div>
    <div class='form-footer'>
      <div class="row justify-content-end">
        <div class='col-md-2 m-0'>
          <a type="submit" href="/teachers" class='btn btn-cancel'>Cancelar</a>
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
    });  
  </script>