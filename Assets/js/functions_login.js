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
                            
                            window.location = base_url+'dashboard';

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

}, false);