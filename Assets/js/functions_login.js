const loginText = document.querySelector(".titulo-texto .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (() => {
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (() => {
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
});
signupLink.onclick = (() => {
    signupBtn.click();
    return false;
});
var divLoading = document.querySelector('#divLoading');

document.addEventListener('DOMContentLoaded', function () {

    if (document.querySelector("#formLogin")) {

        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function (e) {

            e.preventDefault();

            let strEmail = document.querySelector("#txtEmail").value;
            let strPassword = document.querySelector("#txtPassword").value;

            if (strEmail = "" || strPassword == "") {

                Swal.fire(
                    'Porfavor!',
                    'Escribe correo y constreña del usuario.',
                    'error'

                );
                return false;
            } else {

                divLoading.style.display="flex";

                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
                var ajaxUrl = base_url + 'Login/loginUser';
                

                var formData = new FormData(formLogin);
                request.open('POST', ajaxUrl, true);
                request.send(formData);

                request.onreadystatechange = function(){
                    if (request.readyState != 4) return;
                    if (request.status == 200) {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                           if(objData.msg == "Cliente"){
                                window.location = base_url+'home';
                           }else{
                            window.location = base_url+'Dashboard';
                           }
                          

                        }else{
                            Swal.fire(
                                'Atención!',
                                objData.msg,
                                'error'
                            );
                            document.querySelector("#txtPassword").value = "";
                            
                        }
                    }else{
                        Swal.fire(
                            'Atención!',
                            'Error en el proceso',
                            'error'
                        );  
                    }
                    divLoading.style.display="none";
                return false;
                }
            }

        }

    }

    if (document.querySelector("#formRecetPass")) {
        let formRecetPass = document.querySelector("#formRecetPass");

        formRecetPass.onsubmit = function (e) {
          e.preventDefault();
    
          let strEmail = document.querySelector("#txtEmailReset").value;
          if (strEmail == "") {
            Swal.fire({
              icon: 'error',
              title: 'ATENCION',
              text: 'Escriba tu correo electronico',
            });
            return false;
          } else {
            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxurl = base_url + 'Login/resetPass';
            var formData = new FormData(formRecetPass);
            request.open("POST", ajaxurl, true);
            request.send(formData);
            request.onreadystatechange = function () {
              if(request.readyState != 4) return;

              if(request.status == 200){
    
                var objData = JSON.parse(request.responseText);
               
                if(objData.status)
                {
                  Swal.fire({
                    text: objData.msg,
                    icon: "success",
                    confirmButtonText: "Aceptar",
                    
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location = base_url;
                    }
                  });
                  
                }else{
                  Swal.fire("Atención", objData.msg, "error");
                }
              }else {
                Swal.fire("Atención","Error en el proceso", "error");
              }
              divLoading.style.display = "none";
              return false;
            }
    
          }
        }
      }

      if(document.querySelector("#formCambiarPass")){
        let formCambiarPass = document.querySelector("#formCambiarPass");
        formCambiarPass.onsubmit = function(e) {
          e.preventDefault();
    
          let strPassword = document.querySelector('#txtPassword2').value;
          let strPasswordConfirm = document.querySelector('#txtPasswordConfirm2').value;
          let idpersona = document.querySelector('#idpersona').value;
        
          if(strPassword == "" || strPasswordConfirm == ""){
            Swal.fire("Por favor", "Escribe la nueva contraseña.", "error");
            return false;
          }else{
            if(strPassword.length < 5){
              Swal.fire("Atencion", "La nueva contraseña debe tener un minimo de 5 caracteres.", "info");
              return false;
            }
            if(strPassword != strPasswordConfirm){
              Swal.fire("Atencion", "Las contraseñas no coinciden.", "info");
              return false;
            }
    
            var request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Login/setPassword';
            var formData = new FormData(formPasswordReset2);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
              if(request.readyState != 4) return;
              if(request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                  Swal.fire({
                    text: objData.msg,
                    icon: "success",
                    confirmButtonText: "Iniciar sesión",
                    
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location = base_url+'login';
                    }
                  });
                }else{
                  Swal.fire("Atención", objData.msg, "error");
                }
              }else{
                Swal.fire("Atención","Error en el proceso", "error");
              }
            }
          }
        }
      }

}, false);