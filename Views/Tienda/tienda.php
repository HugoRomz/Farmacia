<?php headerTienda($data); 
$arrProductos = $data['productos'];
// dep($arrProductos);
?>

<div class="contenedor">
    <div class="gallery-tittle">
        <center>
            <img id="imagen" src="" alt="">
        </center>
    </div>
    <div class="gallery">
<!-- ForEach buscando imprimiendo todos los productos existentes en la tabla -->
        <?php for ($p=0; $p < count($arrProductos); $p++) {
            // Asigno variables con los datos que vienen del array del producto
            $nombre = $arrProductos[$p]['nombrep'];
            $descripcion =  $arrProductos[$p]['descripcion'];  
            $categoria = $arrProductos[$p]['nombre'];   
            $precio = $arrProductos[$p]['precio']; 
            $cantidad = $arrProductos[$p]['stock'];
            $descuento = $precio -10;     
            $foto = $arrProductos[$p]['imagen'];
            ?>
           
            <!-- Asgino la variable a cada etiqueta de la vista de productos -->
        <div class="product-card">
            <?php if ($cantidad <= 10) {?>
                <div class="badge">Agotandose</div>
            <?php }?>
            
            <div class="product-tumb">
                <!-- url foto -->
                <img src="<?=media()?>/images/uploads/<?= $foto?>" alt="">
            </div>
            <div class="product-details">
                <!-- Categoria -->
                <span class="product-catagory"> <?= $categoria?></span>
                <!-- nombre -->
                <h4><a href=""> <?= $nombre?></a></h4>
                <!-- descripcion -->
                <p> <?= $descripcion?></p>
                <div class="product-bottom-details">
                    <!-- Precio -->
                    <div class="product-price">
                        <small>$<?= $precio?></small>
                        $<?= $descuento?></div>
                    <div class="product-links">
                        <span ></span><i onClick="dataPro('<?= $arrProductos[$p]['idproducto'];?>',' <?= $_SESSION['userData']['idpersona']?>')" style="cursor: pointer;" class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
        </div>
        
        <?php }?>
    </div>
    <!-- paginacion -->
    <div class="pagination">
        <li class="page-item previous-page disable"><a class="page-link" href="#">Prev</a></li>
        <li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">6</a></li>
        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
        <li class="page-item current-page"><a class="page-link" href="#">10</a></li>
        <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>
    </div>
</div>
</div>
<script>
    const base_url = "<?php base_url();?>"
    // Parte del banner de productos
    /**
     * Array con las imagenes y enlaces que se iran mostrando en la web
     */
    var imagenes = new Array(
        [base_url + 'Assets/images/uploads/productosbanner1.svg', base_url + 'Assets/images/'],
        [base_url + 'Assets/images/uploads/productosbanner2.svg', base_url + 'Assets/images/'],
        [base_url + 'Assets/images/uploads/productosbanner3.svg', base_url + 'Assets/images/'],
        [base_url + 'Assets/images/uploads/productosbanner4.svg', base_url + 'Assets/images/'],
        [base_url + 'Assets/images/uploads/productosbanner5.svg', base_url + 'Assets/images/']
    );
    var contador = 0;
    /**
     * Funcion para cambiar la imagen y link
     */
    function rotarImagenes() {
        // cambiamos la imagen y la url
        contador++
        document.getElementById("imagen").src = imagenes[contador % imagenes.length][0];
    }
    /**
     * Función que se ejecuta una vez cargada la página
     */
    onload = function () {
        // Cargamos una imagen aleatoria
        rotarImagenes();

        // Indicamos que cada 5 segundos cambie la imagen
        setInterval(rotarImagenes, 5000);
    }
    // Termina Banner
 // Comienza Paginación

    // Termina Paginación
    
</script>


<?php footerTienda($data); ?>