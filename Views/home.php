<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos de la pagina principal -->
      <link rel="stylesheet" href="<?=media();?>css/simplegrid.css">
      <link rel="stylesheet" href="<?=media();?>css/estilos.css">
  
    <!-- Iconos de Materialize -->
    <link rel="stylesheet" href="<?=media();?>css/fontawesome/css/all.css">

    <!-- Titulo de la pagina segun el controller -->
    <title>Farmacia Dr.Mundo</title>

</head>

<body>
    <!-- Boton para desplegar el menu o sidebar -->
    <input type="checkbox" id="checkSidebar" name="checkSidebar">

    <!-- Area del Header o Navbar-->
    <header>
        <label for="checkSidebar">
        <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="area_izquierda">
            <h3>Farmacia <span>Dr. Mundo</span> </h3>
        </div>
        <div class="area_derecha">
            <a href="#" class="btn_salir"><i class="fa-solid fa-right-from-bracket"></i></i></a>
        </div>
    </header>
    <!-- Termina el Header o navbar -->
    <!-- Barra Lateral -->
    <div class="sidebar">
        <center>
            <img src="<?=media();?>/images/uploads/akaliuser.png" class="imagen_perfil" alt="">
            <h3>Akali Jhomen Tethi</h3>
            <hr>
        </center>
        <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"><i class="fas fa-users"></i><span>Clientes</span></a>
        <a href="#"><i class="fas fa-capsules"></i><span>Medicamentos</span></a>
        <a href="#"><i class="fas fa-cash-register"></i><span>Punto de Venta</span></a>
        <a href="#"><i class="fas fa-file-invoice"></i><span>Reportes</span></a>
    </div>
    <!-- Termina Barra Lateral -->
    <div class="MainContainer">
    
    </div>
</body>

</html>