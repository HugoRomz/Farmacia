<?php headerAdmin($data); ?>

<div class="MainContainer">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Registro de Productos</h5>
                    </div>
                    <div class="card-body">
                        <form id="formProductos" name="formProductos">
                            <div class="form-style-6">
                                <input type="hidden" id="idProducto" name="idProducto">
                                <input type="text" id="txtNombreProductos" name="txtNombreProductos"
                                    placeholder="Nombre del Producto" required>
                                <select id="selectCategorias" name="selectCategorias" required></select>
                                <input type="text" id="txtDescricion" name="txtDescricion" placeholder="Descricion"
                                    required>
                                <input type="number" name="numberStock" id="numberStock" required>
                                <input type="date" name="dateCaducidad" id="dateCaducidad" required>
                                <input type="text" id="txtPrecio" name="txtPrecio" placeholder="Precio" required>
                                    <div class="upload-file-wrapper">
                                         <button class="file">Upload a file</button>
                                         <input type="file" name="imagen" id="imagen"/>
                                    </div>
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
                        <h5 class="card-title">Tabla de Productos</h5>
                    </div>
                    <div class="card-body">
                        <table id="tableProductos" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Descricion</th>
                                    <th>Stock</th>
                                    <th>Caducidad</th>
                                    <th>Precio</th>
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