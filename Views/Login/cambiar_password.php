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
    <div class="wrapper">
        <div class="logo">
            <img src="<?=media();?>images/uploads/logo.svg" alt="" srcset="">
        </div>
        <div class="titulo-texto">
            <div class="titulo login">Reset Contraseña</div>
        </div>
        <div class="form-container">
            <div class="form-inner">
            <form class="resetpass" id="formCambiarPass" name="formCambiarPass" action="">
          <input type="hidden" id="idpersona" name="idpersona" value="<?= $data['idpersona']; ?>" required>
          <input type="hidden" id="txtEmail" name="txtEmail" value="<?= $data['email_user']; ?>" required>
          <input type="hidden" id="txtToken" name="txtToken" value="<?= $data['token']; ?>" required>
          <div class="field">
            <input class="form-control" type="password" id="txtPassword2" name="txtPassword2" placeholder="Nueva contraseña">
          </div>
          <div class="field">
            <input class="fomr-control" type="password" id="txtPasswordConfirm2" name="txtPasswordConfirm2" placeholder="Confirmar contraseña">
          </div>
          <div class="field">
          <button type="submit" class="btn btn-primary btn-block" ><i class="fa fa-unlock fa-lg fa-fw"></i>Resetear</button>
          </div>
          <div class="field">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar al login</a></p>
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