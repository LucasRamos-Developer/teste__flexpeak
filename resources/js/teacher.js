const TEACHER = TEACHER || {};

TEACHER.data_table = null;


TEACHER.init_dataTable = function (_route) {
  var extensions = {
    "sFilterInput": "form-control",
  }
  // Used when bJQueryUI is false
  $.extend($.fn.dataTableExt.oStdClasses, extensions);
  
  TEACHER.data_table = $('.data-table').DataTable({
    language: Utility.lang_pt,
    bLengthChange: false,
    processing: true,
    serverSide: true,
    ajax: _route,
    order: [[0, "asc" ]],
    columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'birth_date', name: 'birth_date', className: 'birth_date'},
        {data: 'actions', name: 'actions', className: 'actions', orderable: false, searchable: false},
    ]
  });
}; 

TEACHER.delete = function(_this, _event) {
  var _confir = confirm("Tem certeza que deseja deletear o registro???");
  if (!_confir) {
    _event.preventDefault();
  }
};

window.Teacher = TEACHER;