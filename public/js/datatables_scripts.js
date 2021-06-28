/**
 * Parâmetros de linguagem Pt-BR para o DataTables
 *
 * @see https://datatables.net/
 */
var dataTableLang = {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "<div class='loader-container'><div class='loader'><div class='loader-wheel'></div><div class='loader-text'></div></div></div>",
    "sProcessing": "Processando....",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar:",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    },
    "buttons": {
        pageLength: {
            _: "Mostrando %d linhas",
            '-1': "Mostrando todos"
        },
        print: "Imprimir"
    }
};

$(".t_paginada_client_processing").each(function (){
    let tb_r = $(this);
    tb_r.DataTable({
        pageLength: 20,
        language: dataTableLang,
        "searching": true,
        dom: 'frtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 linhas', '25 linhas', '50 linhas', 'Todos']
        ],
    });
});



