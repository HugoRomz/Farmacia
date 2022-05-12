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
    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?=media();?>plugins/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div id="divLoading">
        <div>
            <img src="<?=media();?>images/loading.svg" alt="Loading">
        </div>
    </div>
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
                <form action="" class="login" name="formLogin" id="formLogin">
                    <div class="field">
                        <input type="email" name="txtEmail" id="txtEmail" placeholder="Correo Electronico" required>
                    </div>
                    <div class="field">
                        <input type="password" name="txtPassword" id="txtPassword" placeholder="Contraseña" required>
                    </div>
                    <div class="pass-link"><a href="<?=base_url();?>resetpass">Olvidaste tu contraseña?</a></div>
                    <div class="field">
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">No estas registrado? <a href="#">Registrate ahora</a></div>
                </form>

                <form id="formRegister" name="formRegister"  class="singup">
                    <div class="field">
                        <input type="text" id="txtNombreRegister" name="txtNombreRegister"placeholder="Nombre"  required>
                    </div>
                    <div class="field">
                        <input type="email"  id="txtEmailRegister"  name="txtEmailRegister"placeholder="Correo Electronico"required>
                    </div>
                    <div class="field">
                        <input type="password"  id="txtPasswordRegister"   name="txtPasswordRegister"placeholder="Contraseña"required>
                    </div>
                    <div class="field">
                        <input type="password"  id="txtPassword2Register"name="txtPassword2Register" placeholder="Repertir contraseña" required>
                    </div>
                    <div class="field">
                        <input type="submit"  value="Registrate">
                    </div>
                </form>

                

            </div>
        </div>
    </div>
    <script>
        const base_url = "<?= base_url();?>";
    </script>

    <script src="<?=media();?>js/functions_login.js"></script>
    <!-- SweetAlert -->
    <script src="<?=media();?>plugins/sweetalert2/sweetalert2.min.js"></script>

</body>

</html>