<?php 

headerAdmin($data);

?>

<div class="MainContainer">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Roles </h5>
                    </div>
                    <div class="card-body">

                        <form id="formRoles" name="formRoles">
                            <div class="form-style-6">
                                <input type="hidden" id="idRol" name="idRol">
                                <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre del Rol"
                                    required>
                                <input type="text" id="txtDescripcion" name="txtDescripcion"
                                    placeholder="Descripción del rol" required>
                                <select id="selectStatus" name="selectStatus" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                <!-- <textarea name="field3" placeholder="Type your Message"></textarea> -->
                                <div>

                                    <input class="btn-guardar" type="submit" value="Guardar" />
                                    <input class="btn-editar" type="submit" value="Editar" />
                                    <input class="btn-eliminar" type="submit" value="Eliminar" />
                                    <input class="btn-limpiar" type="submit" value="Limpiar" />

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
    <div id="contentAjax"></div> 
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tabla de Clientes</h5>
                    </div>
                    <div class="card-body">
                        <table id="tableRoles" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<?php footerAdmin($data); 


?>
