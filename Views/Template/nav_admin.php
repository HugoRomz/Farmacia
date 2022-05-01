  <!-- Celular -->
  <div class="mobile_nav">
      <div class="nav_bar">
          <img src="<?=media();?>images/uploads/akaliuser.png" class="mobile_foto_perfil" alt="">
          <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
          <a href="#" class="active"><i class="fas fa-desktop active"></i><span>Dashboard</span></a>
          <a href="#" class=""><i class="fas fa-users"></i><span>Clientes</span></a>
          <a href="#" class=""><i class="fas fa-capsules"></i><span>Medicamentos</span></a>
          <a href="#" class=""><i class="fas fa-cash-register"></i><span>Punto de Venta</span></a>
          <a href="#" class=""><i class="fas fa-file-invoice"></i><span>Reportes</span></a>
      </div>
  </div>
  <!-- Barra Lateral -->
  <div class="sidebar">
      <div class="perfil">
          <?php if ($_SESSION['userData']['nombrerol'] == 'Administrador') { ?>
                <img src="<?=media();?>images/uploads/admin.png" class="imagen_perfil" alt="">
          <?php }else { ?>
                <img src="<?=media();?>images/uploads/akaliuser.png" class="imagen_perfil" alt="">
          <?php  } ?>
          <center>
              <h3><?= $_SESSION['userData']['nombres'];?> <?= $_SESSION['userData']['apellido'];?></h3>
              <p><?= $_SESSION['userData']['nombrerol'];?></p>
          </center>
      </div>
      <hr>

      <?php if(!empty($_SESSION['permisos'][1]['r'])) {?>
        <a href="<?=base_url();?>dashboard"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <?php }?>

      <?php if(!empty($_SESSION['permisos'][2]['r'])) {?>
        <a href="<?=base_url();?>cliente"><i class="fas fa-users"></i><span>Usuarios</span></a>
        <a id="nav-margin" href="<?=base_url();?>roles"><i class="fa-regular fa-circle"></i><span>Roles</span></a>
      <?php }?>

      <?php if(!empty($_SESSION['permisos'][3]['r'])) {?>
        <a href="<?=base_url();?>cliente"><i class="fas fa-users"></i><span>Usuarios</span></a>
        <a id="nav-margin" href="<?=base_url();?>roles"><i class="fa-regular fa-circle"></i><span>Roles</span></a>
      <?php } ?>

      <?php if(!empty($_SESSION['permisos'][4]['r'])) {?>
        <a href="<?=base_url();?>productos"><i class="fas fa-capsules"></i><span>Productos</span></a>
        <a id="nav-margin" href="<?=base_url();?>categorias"><i
              class="fa-regular fa-circle"></i><span>Categorias</span></a>
      <?php } ?>       
        <?php if(!empty($_SESSION['permisos'][5]['r'])) {?>
            <a href="<?=base_url();?>ventas"><i class="fas fa-cash-register"></i><span>Punto de Venta</span></a>
        <?php } ?>

        <?php if(!empty($_SESSION['permisos'][6]['r'])) {?>

            <a id="nav-margin" href="<?=base_url();?>pedido"><i class="fa-regular fa-circle"></i><span>Pedido</span></a>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][6]['r'])) {?>
            <a href="<?=base_url();?>reportes"><i class="fas fa-file-invoice"></i><span>Reportes</span></a>
        <?php } ?>

  </div>
  <!-- Termina Barra Lateral -->