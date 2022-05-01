var tablePedidos

$(document).ready(function () {

    tablePedidos = $('#tablePedidos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Pedido/getPedido",
            "dataSrc": ""
        },
        "columns": [{
                "data": "idpedido"
            },
            {
                "data": "nombres"
            },
            {
                "data": "fecha"
            },
            {
                "data": "monto"
            },
            {
                "data": "tipopagoid"
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


//     fntRolesUsuario();

//     if (document.querySelector("#formCliente")) {
//         var formUsuarios = document.querySelector("#formCliente");

//         formUsuarios.onsubmit = function (e) {
//             e.preventDefault();

//             var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
//             var ajaxUrl = base_url + 'Cliente/setCliente';

//             var formData = new FormData(formUsuarios);
//             request.open('POST', ajaxUrl, true);
//             request.send(formData);


//             request.onreadystatechange = function () {

//                 if (request.readyState == 4 && request.status == 200) {
//                     var objData = JSON.parse(request.responseText);

//                     if (objData.status) {
//                         formCliente.reset();

//                         if (objData.msg == '1') {
//                             Swal.fire(
//                                 'Exito!',
//                                 'El registro se completo con exito!',
//                                 'success'
//                             )
//                         } else {
//                             Swal.fire(
//                                 'Exito!',
//                                 'Registro Editado',
//                                 'success'
//                             )
//                         }
//                         tableCliente.ajax.reload(null, false);

//                     } else {
//                         Swal.fire(
//                             'Error!',
//                             'Reitente el registro',
//                             'error'
//                         )
//                     }
//                 }
//                 return false;
//             }
//             return false;
//         }
//     }

 });

// function fntRolesUsuario() {
//     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
//     var ajaxUrl = base_url + 'Roles/getSelectRoles';
//     request.open("GET", ajaxUrl, true);
//     request.send();

//     request.onreadystatechange = function () {
//         if (request.readyState == 4 && request.status == 200) {
//             document.querySelector('#selectRol').innerHTML = request.responseText;
//             document.querySelector('#selectRol').value = 1;
//         }
//     }
// }



// function fntEditCliente(button) {


//     var idCliente = button.getAttribute("rl");

//     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
//     var ajaxUrl = base_url + 'Cliente/getIdCliente/' + idCliente;
//     request.open("GET", ajaxUrl, true);
//     request.send();

//     request.onreadystatechange = function () {
//         if (request.readyState == 4 && request.status == 200) {
//             // console.log(request.responseText);
//             var objData = JSON.parse(request.responseText);
//             // console.log(objData);
//             if (objData.status) {
//                 document.querySelector("#idCliente").value = objData.data.idpersona;
//                 document.querySelector("#txtNombreCliente").value = objData.data.nombres;
//                 document.querySelector("#txtApellidos").value = objData.data.apellido;
//                 document.querySelector("#txtTelefono").value = objData.data.telefono;
//                 document.querySelector("#txtEmailCliente").value = objData.data.email_user;
//                 document.querySelector("#txtPassword").value = objData.data.password;
//                 document.querySelector("#selectRol").value = objData.data.idrol;

//             } else {
//                 Swal.fire(
//                     'Error!',
//                     'Al cargar el registro',
//                     'error'
//                 )
//             }
//         }
//     }
// }


// function fntDelCliente(button) {

//     var idCliente = button.getAttribute("rl");
//     Swal.fire({
//         title: 'Estas seguro?',
//         text: "Se eliminara el dato!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si, eliminar!'
//     }).then((result) => {
//         if (result.isConfirmed) {

//             var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
//             var ajaxUrl = base_url + 'Cliente/delCliente/';
//             var strData = "idCliente=" + idCliente;

//             request.open("POST", ajaxUrl, true);
//             request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//             request.send(strData);

//             request.onreadystatechange = function () {
//                 if (request.readyState == 4 && request.status == 200) {
//                     // console.log(request.responseText);
//                     var objData = JSON.parse(request.responseText);
//                     if (objData.status) {
//                         tableCliente.ajax.reload(null, false);
//                         Swal.fire(
//                             'Eliminado!',
//                             'Tu registro fue eliminado.',
//                             'success'
//                         )

//                     } else {
//                         Swal.fire(
//                             'Error!',
//                             objData.msg,
//                             'error'
//                         );

//                     }
//                 }
//             }

//         }
//     })

// }