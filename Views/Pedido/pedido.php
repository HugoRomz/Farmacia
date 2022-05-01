<?php headerAdmin($data); ?>

<div class="MainContainer">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tabla de Pedidos</h5>
                    </div>
                    <div class="card-body">
                        <table id="tablePedidos" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Persona</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Tipo de Pago</th>
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