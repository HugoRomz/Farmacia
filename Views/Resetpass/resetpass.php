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
            <div class="titulo login">Reset Contraseña</div>
        </div>
        <div class="form-container">
            <div class="form-inner">
            <form id="formRecetPass" name="formRecetPass" action="#" class="resetpass">       
                    <div class="field">
                        <input id="txtEmailReset"name="txtEmailReset" class="fomr-control" type="email" placeholder="Correo Electronico" required>
                    </div>
                    <div class="pass-link"><a href="<?=base_url();?>login">Iniciar Sesión</a></div>
                    <div class="field">
                        <input type="submit" ><i class="fa fa-unlock fa-lg fa-fw"></i>Resetear</input>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script>
        const base_url = "<?= base_url();?>";
    </script>
    <!-- SweetAlert -->
    <script src="<?=media();?>plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?=media();?>js/functions_resetPass.js"></script>
</body>
</html>