<?php headerTienda($data); ?>
<div class="contenedor" id="fondo">
    <div class="row">
        <div class="col-1">
            <h2 class="equipo"><i>NUESTRO EQUIPO</i></h2>
            <p>Integrado por los casi mejores alumnos de Ing. Software de la Facultad de Negocios UNACH IV.</p>
        </div><br>
    </div>
    <div class="row">

        <div class="card">
            <img src="<?= media();?>Tienda/img/carlosguapo.jpg">
            <h4>Carlos Martínez</h4>
            <p>Practicante Software Enginer</p>
            <div class="links">
                <a href="http://github.com"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100008598556725"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://api.whatsapp.com/send?phone=9626959392"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="card">
            <img src="<?= media();?>Tienda/img/horacioguapo.jpg">
            <h4>Josue Marroquín</h4>
            <p>Geminis</p>
            <div class="links">
                <a href="http://github.com"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.facebook.com/Black.Demon0106/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://api.whatsapp.com/send?phone=9621581709"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="card">
            <img src="<?= media();?>Tienda/img/hugo.jpg">
            <h4>Rafael Rosales</h4>
            <p>Musician</p>
            <div class="links">
                <a href="http://github.com"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.facebook.com/HugoRomsz/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://api.whatsapp.com/send?phone=9621705041"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>

    </div>
    <?php footerTienda($data); ?>