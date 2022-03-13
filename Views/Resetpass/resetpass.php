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
            <div class="titulo login">Reset Contraseña</div>
        </div>
        <div class="form-container">
            <div class="form-inner">
            <form action="#" class="resetpass">       
                    <div class="field">
                        <input type="email" placeholder="Correo Electronico" required>
                    </div>
                    <div class="pass-link"><a href="<?=base_url();?>login">Iniciar Sesión</a></div>
                    <div class="field">
                        <input type="submit" value="Reset Contraseña">
                    </div>
                </form>
                
            </div>
        </div>
    </div>

  
</body>
</html>