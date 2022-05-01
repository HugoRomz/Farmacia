<?php headerTienda($data); 
$arrProductos = $data['productos'];
// dep($arrProductos);
?>

<div class="contenedor">
    <div class="gallery-tittle">
        <center>
        <img src="<?=media();?>/images/uploads/productosbanner1.png" alt="">
        </center>
    </div>
    <div class="gallery">
        
        <?php for ($p=0; $p < count($arrProductos); $p++) {
            $nombre = $arrProductos[$p]['nombrep'];
            $descripcion =  $arrProductos[$p]['descripcion'];  
            $categoria = $arrProductos[$p]['nombre'];   
            $precio = $arrProductos[$p]['precio']; 
            $descuento = $precio -10;     
            $foto = $arrProductos[$p]['imagen'];
            ?>
        <div class="product-card">
            <!-- <div class="badge">Hot</div> -->
            <div class="product-tumb">
                <img src="<?=media()?>/images/uploads/<?= $foto?>" alt="">
            </div>
             <div class="product-details">
                <span class="product-catagory"> <?= $categoria?></span>
                <h4><a href=""> <?= $nombre?></a></h4>
                <p> <?= $descripcion?></p>
                    <div class="product-bottom-details">
                        <div class="product-price">
                            <small>$<?= $precio?></small>
                            $<?= $descuento?></div>
                        <div class="product-links">
                            <a href=""><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
             </div>
        </div>
        <?php }?>
    </div>
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


<?php footerTienda($data); ?>