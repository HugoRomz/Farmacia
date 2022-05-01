<?php headerAdmin($data); ?>

   
<div class="MainContainer">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Registro de Usuarios </h5>
                    </div>
                    <div class="card-body">

                        <form id="formCliente" name="formCliente">
                            <div class="form-style-6">
                                <input type="hidden" id="idCliente" name="idCliente">
                                <input type="text" id="txtNombreCliente" name="txtNombreCliente"
                                    placeholder="Tus nombres" required>
                                <input type="text" id="txtApellidos" name="txtApellidos" placeholder="Tus apellidos"
                                    required>
                                <input type="text" id="txtTelefono" name="txtTelefono" placeholder="Teléfono" required>
                                <input type="email" id="txtEmailCliente" name="txtEmailCliente" placeholder="Email" required>
                                <input type="password" id="txtPassword" name="txtPassword" placeholder="Password"
                                    required>
                                <select id="selectRol" name="selectRol" required></select>
                                <!-- <textarea name="field3" placeholder="Type your Message"></textarea> -->
                                <div>
                                
                                    <input class="btn-guardar" type="submit" value="Guardar" />
                                
                                    <input class="btn-editar" type="submit" value="Editar" />
        
                                    <input class="btn-limpiar" type="reset" value="Limpiar" />
                                    

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tabla de Clientes</h5>
                    </div>
                    <div class="card-body">
                        <table id="tableCliente" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Rol</th>
                                    <th>Status</th>
                                    <th>Options</th>
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

<?php footerAdmin($data); ?>