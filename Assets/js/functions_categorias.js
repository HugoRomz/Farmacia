var tableCategorias

$(document).ready(function () {

    tableCategorias = $('#tableCategorias').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Categorias/getCategorias",
            "dataSrc": ""
        },
        "columns": [{
                "data": "idcategoria"
            },
            {
                "data": "nombre"
            },
            {
                "data": "descripcion"
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



    if (document.querySelector("#formCategorias")) {
        var formCategorias = document.querySelector("#formCategorias");

        formCategorias.onsubmit = function (e) {
            e.preventDefault();

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url + 'Categorias/setCategorias';

            var formData = new FormData(formCategorias);
            request.open('POST', ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {

                        formCategorias.reset();

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
                        tableCategorias.ajax.reload(null, false);

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

function fntEditCategorias(button) {


    var idCategorias = button.getAttribute("rl");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Categorias/getIdCategorias/' + idCategorias;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            // console.log(objData);
            if (objData.status) {
                document.querySelector("#idCategorias").value = objData.data.idcategoria;
                document.querySelector("#txtNombreCategorias").value = objData.data.nombre;
                document.querySelector("#txtAreaCategoria").value = objData.data.descripcion;

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


function fntDelCategorias(button) {

    var idCategorias = button.getAttribute("rl");
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
            var ajaxUrl = base_url + 'Categorias/delCategorias/';
            var strData = "idCategorias=" + idCategorias;

            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    // console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {

                        tableCategorias.ajax.reload(null, false);
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