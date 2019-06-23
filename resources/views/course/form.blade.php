<div class='form-wrap'>
  <div class='row'>
    <div class='col-8'>
      {{ Form::label('name', 'Nome', array('class' => 'form-label')) }}
      {{ Form::text('name', $course->name, array('class' => 'form-control', 'required' => true)) }}
    </div>
    <div class='col-4'>
      {{ Form::label('teacher_id', 'Professor', array('class' => 'form-label')) }}
      {{ Form::select('teacher_id', $teachers, $course->teacher_id, array('class' => 'form-control')) }}
    </div>
  </div>
  <div class='form-footer'>
    <div class="row justify-content-end">
      <div class='col-md-2 m-0'>
        <a type="submit" href="/courses" class='btn btn-cancel'>Cancelar</a>
      </div>
      <div class='col-md-2 m-0'>
        <button type="submit" class='btn btn-submit'>Salvar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function() {
   
  });  
</script>