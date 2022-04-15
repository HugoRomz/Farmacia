var tableProductos

$(document).ready(function () {
    tableProductos = $('#tableProductos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Productos/getProductos",
            "dataSrc": ""
        },
        "columns": [{
                "data": "idproducto"
            },
            {
                "data": "nombrep"
            },
            {
                "data": "nombre"
            },
            {
                "data": "descripcion"
            },
            {
                "data": "stock"
            },
            {
                "data": "caducidad"
            },
            {
                "data": "precio"
            },
            {
                "data": "status"
            },
            {
                "data": "options"
            }
        ],
        'dom': 'lBfrtip',
        "order": [
            [1, "asc"]
        ],
        "responsive": "true",
        "Destroy": "true",

    });


    fntCategorias();

    if (document.querySelector("#formProductos")) {
        var formProductos = document.querySelector("#formProductos");

        formProductos.onsubmit = function (e) {
            e.preventDefault();

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url + 'Productos/setProductos';

            var formData = new FormData(formProductos);
            request.open('POST', ajaxUrl, true);
            request.send(formData);


            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {

                        formProductos.reset();

                        if (objData.msg == '1') {
                            Swal.fire(
                                'Exito!',
                                'El registro se completo con exito!',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Exito!',
                                'Registro Editado',
                                'success'
                            )
                        }
                        tableProductos.ajax.reload(null, false);

                    } else {
                        Swal.fire(
                            'Error!',
                            'Reitente el registro',
                            'error'
                        )
                    }
                }
                return false;
            }
            return false;
        }
    }

});

function fntCategorias() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Categorias/getSelectCategorias';
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#selectCategorias').innerHTML = request.responseText;
            document.querySelector('#selectCategorias').value = 1;
        }
    }
}



function fntEditProductos(button) {

    var idProducto = button.getAttribute("rl");
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Productos/getIdProductos/' + idProducto;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            // console.log(objData);
            if (objData.status) {
                document.querySelector("#idProducto").value = objData.data.idproducto;
                document.querySelector("#txtNombreProductos").value = objData.data.nombrep;
                document.querySelector("#selectCategorias").value = objData.data.idcategoria;
                document.querySelector("#txtDescricion").value = objData.data.descripcion;
                document.querySelector("#numberStock").value = objData.data.stock;
                document.querySelector("#dateCaducidad").value = objData.data.caducidad;
                document.querySelector("#txtPrecio").value = objData.data.precio;

            } else {
                Swal.fire(
                    'Error!',
                    'Al cargar el registro',
                    'error'
                )
            }
        }
    }
}


function fntDelCliente(button) {

    var idCliente = button.getAttribute("rl");
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
            var ajaxUrl = base_url + 'Cliente/delCliente/';
            var strData = "idCliente=" + idCliente;

            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    // console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        tableCliente.ajax.reload(null, false);
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