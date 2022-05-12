<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia Dr. Mundo</title>   
     <!-- Datables -->
     <link rel="stylesheet" href="<?=media();?>plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?=media();?>tienda/css/estilos.css">
     <!-- Iconos de fontawsome -->
     <link rel="stylesheet" href="<?=media();?>tienda/css/fontawesome/css/all.css">
         <!-- Icono de la pagina -->
    <link rel="icon" type="image/x-icon" href="<?=media();?>images/favicon.ico">
     <!-- SweetAlert -->
     <link rel="stylesheet" href="<?=media();?>plugins/sweetalert2/sweetalert2.min.css">
    
 
</head>

<body>
    <h4>Hola, <?= $_SESSION['userData']['nombres']?></h4>
<hr>
    <div class="container">
        
        <div class="navbar">
           <a href="<?=base_url();?>"> <img src="<?=media();?>tienda/img/logotipo.svg" class="logo"></a>
            <nav>
                <ul id="menuDesplegable">
                    <li><a href="<?=base_url();?>">Inicio</a></li>
                    <li><a href="<?=base_url();?>tienda">Productos</a></li>
                    <li><a href="<?=base_url();?>contacto">Contacto</a></li>
                    <li><a href="<?=base_url();?>mapa">Ubicacion</a></li>                    

                    <?php if ($_SESSION['userData']['nombrerol']== "Administrador") {?>

                        <li><a href="<?=base_url();?>dashboard">Dashboard</a></li>
                        
                    <?php }?>

                    

                    <li><a href="<?=base_url();?>carrito"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li><a href="<?=base_url();?>logout"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
            </nav>
            <img src="<?=media();?>tienda/img/menu.png" class="menu-icon" onclick="toggleMenu()">
        </div>