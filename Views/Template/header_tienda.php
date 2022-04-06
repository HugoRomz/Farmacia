<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <link rel="stylesheet" href="<?=media();?>tienda/css/estilos.css">
     <!-- Iconos de fontawsome -->
     <link rel="stylesheet" href="<?=media();?>tienda/css/fontawesome/css/all.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="<?=media();?>tienda/img/logotipo.png" class="logo">
            <nav>
                <ul id="menuDesplegable">
                    <li><a href="<?=base_url();?>">Inicio</a></li>
                    <li><a href="<?=base_url();?>tienda">Productos</a></li>
                    <li><a href="<?=base_url();?>contacto">Contacto</a></li>
                    <li><a href="<?=base_url();?>extra">Otros</a></li>
                    <li><a href="<?=base_url();?>logout">Iniciar Sesión</a></li>
                </ul>
            </nav>
            <img src="<?=media();?>tienda/img/menu.png" class="menu-icon" onclick="toggleMenu()">
        </div>