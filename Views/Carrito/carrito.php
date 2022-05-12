<?php headerTienda($data); ?>
<div class="contenedor">
<center>
        <div class="col-1">
            <h2 class="equipo"><i>Carrito de Compra</i></h2>
            
        </div>
</center>   
        <div class="row">
                <div class="cardtable">
                    <div class="cardtable-header">
                        <h5 class="card-title">Carrito de <?= $_SESSION['userData']['nombres']?></h5>
                        <div id="idpersona" data-value="<?= $_SESSION['userData']['idpersona']?>" style="display: none"></div>
                    </div>
                    <div class="cardtable-body">
                        
                        <table id="tableCarrito" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Imagen</th>
                                    <th>Status</th>
                                    <th>OP</th>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
          

        </div>
</div>
<script>
     const base_url = "<?php base_url();?>"
</script>
<?php footerTienda($data); ?>