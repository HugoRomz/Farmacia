<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos de la pagina principal -->
    <link rel="stylesheet" href="<?=media();?>css/grid.css">
    <link rel="stylesheet" href="<?=media();?>css/estilos.css">
    <!-- Iconos de Materialize -->
    <link rel="stylesheet" href="<?=media();?>css/fontawesome/css/all.css">

    <!-- Titulo de la pagina segun el controller -->
    <title>Farmacia Dr.Mundo</title>

    <!-- Icono de la pagina -->
    <link rel="icon" type="image/x-icon" href="<?=media();?>images/favicon.ico">

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

   


    <?php  require_once("nav_admin.php");?>