const COURSE = COURSE || {};

COURSE.data_table = null;

COURSE.init_dataTable = function (_route) {
  var extensions = {
    "sFilterInput": "form-control",
  }
  // Used when bJQueryUI is false
  $.extend($.fn.dataTableExt.oStdClasses, extensions);
  
  COURSE.data_table = $('.data-table').DataTable({
    language: Utility.lang_pt,
    bLengthChange: false,
    processing: true,
    serverSide: true,
    ajax: _route,
    order: [[0, "asc" ]],
    columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'teacher_id', name: 'teacher_id'},
        {data: 'actions', name: 'actions', className: 'actions', orderable: false, searchable: false},
    ]
  });
}; 

COURSE.delete = function(_this, _event) {
  var _confir = confirm("Tem certeza que deseja deletear o registro???");
  if (!_confir) {
    _event.preventDefault();
  }
};

window.Course = COURSE;