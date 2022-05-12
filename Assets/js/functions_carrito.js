var tableProductos

$(document).ready(function () {
    let idpersona = $('#idpersona').attr('data-value');
    console.log(idpersona);
    tableProductos = $('#tableCarrito').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Pedido/getCarrito/"+idpersona,
            "dataSrc": ""
        },
        "columns": [{
                "data": "nombrep"
            },
            {
                "data": "precio"
            },
            {
                "data": "cantidad"
            },
            {
                "data": "imgfu"
            },
            {
                "data": "status"
            },
            {
                "data": "op"
            }
        ],
        'dom': 'lBfrtip',
        "order": [
            [1, "asc"]
        ],
        "responsive": "true",
        "Destroy": "true",

    });


    

});

function fntDelCarrito(button) {

    var idCarrito = button.getAttribute("rl");
    Swal.fire({
        title: 'Estas seguro?',
        text: "Se eliminara el dato!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url + 'Pedido/delPedido/';
            var strData = "idCarrito=" + idCarrito;

            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    // console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        tableProductos.ajax.reload(null, false);
                        Swal.fire(
                            'Eliminado!',
                            'Tu registro fue eliminado.',
                            'success'
                        )

                    } else {
                        Swal.fire(
                            'Error!',
                            objData.msg,
                            'error'
                        );

                    }
                }
            }

        }
    })

}