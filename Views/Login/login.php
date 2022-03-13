<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=media();?>css/login/login.css">
    <title>Login Farmacia</title>
    <!-- Icono de la pagina -->
    <link rel="icon" type="image/x-icon" href="<?=media();?>images/favicon.ico">
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="<?=media();?>images/uploads/logo.svg" alt="" srcset="">
        </div>
        <div class="titulo-texto">
            <div class="titulo login">Inicio Sesión</div>
            <div class="titulo signup">Registrarse</div>
        </div>
        <div class="form-container">
        <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Inicio Sesion</label>
               <label for="signup" class="slide signup">Resgistrate</label>
               <div class="slide-tab"></div>
            </div>
            <div class="form-inner">
                <form action="#" class="login">
                    <div class="field">
                        <input type="text" placeholder="Correo Electronico" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Contraseña" required>
                    </div>
                    <div class="pass-link"><a href="<?=base_url();?>resetpass">Olvidaste tu contraseña?</a></div>
                    <div class="field">
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">No estas registrado? <a href="#">Registrate ahora</a></div>
                </form>

                <form action="#" class="singup">
                    <div class="field">
                            <input type="text" placeholder="Nombre" required>
                    </div>
                    <div class="field">
                        <input type="email" placeholder="Correo Electronico" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Contraseña" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Repertir contraseña" required>
                    </div>
                    <div class="field">
                        <input type="submit" value="Registrate">
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <script>
         const loginText = document.querySelector(".titulo-texto .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
    
</body>
</html>