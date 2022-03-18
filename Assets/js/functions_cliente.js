$(document).ready(function () {

    var tableCliente

    
        tableCliente = $('#tableCliente').dataTable( {
            "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
            "ajax": {
                    "url": " "+base_url+"Cliente/getCliente",
                    "dataSrc": ""
                    },
            "columns": [
                { "data": "nombres" },
                { "data": "apellido" },
                { "data": "telefono" },
                { "data": "email_user" },
                { "data": "password" },
                { "data": "nombrerol" },
                { "data": "status" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            "order": [[ 1, "asc" ]],
            "responsive": "true",
            "Destroy": "true",
        } );
        
        $('#tableCliente').DataTable();

});
