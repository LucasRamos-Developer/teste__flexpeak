const UTILITY = UTILITY || {};

UTILITY.lang_pt = {
  "sEmptyTable": "Nenhum registro encontrado",
  "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
  "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
  "sInfoFiltered": "(Filtrados de _MAX_ registros)",
  "sInfoPostFix": "",
  "sInfoThousands": ".",
  "sLengthMenu": "_MENU_ resultados por página",
  "sLoadingRecords": "Carregando...",
  "sProcessing": "Processando...",
  "sZeroRecords": "Nenhum registro encontrado",
  "sSearch": "Pesquisar",
  "oPaginate": {
      "sNext": "Próximo",
      "sPrevious": "Anterior",
      "sFirst": "Primeiro",
      "sLast": "Último"
  },
  "oAria": {
      "sSortAscending": ": Ordenar colunas de forma ascendente",
      "sSortDescending": ": Ordenar colunas de forma descendente"
  }
};

UTILITY.address_by_cep = function($target){
  $target.on('focusout', function(e){  
    var _cep = $(this).val().replace(/\D/g, '');
    if (_cep.length == 8) {
      var __url = "https://viacep.com.br/ws/"+_cep+"/json/";
      $.ajax({
        method: 'GET',
        url: __url,
        dataType: "json",
        success: function(data){
          if (data) {
            $('#address_street').val(data.logradouro);
            $('#address_neighborhood').val(data.bairro);
            $('#address_city').val(data.localidade);
            $('#address_state').val(data.uf);
          }
        }
      })
    }
  });
};


window.Utility = UTILITY;