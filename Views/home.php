<?php headerTienda($data); ?>
<div class="contenedor">
        <div class="row">
            <div class="col-1">
                <h2>Farmacia <i>Dr. Mundo </i></h2>
                <h3>Tienda Virtual</h3>
                <p> Dr mundo es una de las mejores farmacias en todo México, brindando a todos sus
                    usuarios una gran experiencia también una gran variedad de productos de gran calidad, así como también de bajo costo <br>
               <br> <i>"Farmacia Dr Mundo dile adios a tu sufrimiento y comienza hoy tu tratamiento"</i>
               <!-- <i>"Donde comienza el gran bienestar."</i> -->
                </p>
                <a href="<?=base_url();?>productos">Comprar Ahora</a>
            </div>
            <div class="col-2">
                <img src="<?=media();?>tienda/img/image2.png" class="imagen">
             </div>
             
        </div><br>
        </div>
<?php footerTienda($data); ?>