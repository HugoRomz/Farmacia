var tableRoles;
$(document).ready(function () {

   

        tableRoles = $('#tableRoles').DataTable( {
            "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
            "ajax": {
                    "url": " "+base_url+"Roles/getRoles",
                    "dataSrc": ""
                    },
            "columns": [
                { "data": "idrol" },
                { "data": "nombrerol" },
                { "data": "descripcion" },
                { "data": "status" },
                { "data": "options" }
            ],
            'dom': 'lBfrtip',
            "order": [[ 1, "asc" ]],
            "responsive": "true",
            
        } );

        
     

        if (document.querySelector("#formRoles")) {
            var formCliente = document.querySelector("#formRoles");
            formCliente.onsubmit = function (e) {
                e.preventDefault();
    
                var strIdRol = document.querySelector('#idRol').value;
                var strNombreRol = document.querySelector('#txtNombre').value;
                var strDrescripcion = document.querySelector('#txtDescripcion').value;
                var intStatus = document.querySelector('#selectStatus').value;
                
                if (strNombreRol == '' || strDrescripcion == ''|| intStatus == '') {
                    Swal.fire(
                        'Incompleto!',
                        'Complete su registro',
                        'error'
                      )
                    return false;
                }

                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
                var ajaxUrl = base_url + 'Roles/setRoles';
    
                var formData = new FormData(formRoles);
                request.open('POST', ajaxUrl, true);
                request.send(formData);
               
    
                request.onreadystatechange = function () {
    
                    if (request.readyState == 4 && request.status == 200) {
                        var objData = JSON.parse(request.responseText);
    
                        if (objData.status) {
                            formRoles.reset();
                       
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
                            tableRoles.ajax.reload(null,false);
    
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
            }
        }
});


function fntEditRoles(button) {


    var idRol = button.getAttribute("rl");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Roles/getIdRol/' + idRol;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            // console.log(objData);
            if (objData.status) {
                document.querySelector("#idRol").value = objData.data.idrol;
                document.querySelector("#txtNombre").value = objData.data.nombrerol;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                document.querySelector("#selectStatus").value = objData.data.status;
                
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


function fntDelRoles(button) {

    var idRol = button.getAttribute("rl");
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
            var ajaxUrl = base_url+'Roles/delRol/';
            var strData = "idRol="+idRol;

            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    // console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        tableRoles.ajax.reload(null,false);
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

