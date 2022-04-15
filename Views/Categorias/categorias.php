<?php headerAdmin($data); ?>

<div class="MainContainer">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Registro de Categorias</h5>
                    </div>
                    <div class="card-body">
                        <form id="formCategorias" name="formCategorias">
                            <div class="form-style-6">
                                <input type="hidden" id="idCategorias" name="idCategorias">
                                <input type="text" id="txtNombreCategorias" name="txtNombreCategorias"
                                    placeholder="Nombre de la Categoria" required>                               
                               <input type="text" id="txtAreaCategoria" name="txtAreaCategoria" placeholder="Descripcion de la Categoria"
                                    required>
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
                        <h5 class="card-title">Tabla de Categorias</h5>
                    </div>
                    <div class="card-body">
                        <table id="tableCategorias" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
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