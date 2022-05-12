<?php headerAdmin($data); ?>

<div class="MainContainer">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Visitas a la página</h5>
                    </div>
                    <div class="card-body"><canvas id="myChart"></canvas></div>

                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ventas por día</h5>
                    </div>
                                    <div class="card-body"><canvas id="myChart2"></canvas></div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Productos más Vendidos</h5>
                    </div>
                    <div class="card-body"><canvas id="myChart3"></canvas></div>

                </div>
            </div>
        </div>
        
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ganancias Totales</h5>
                    </div>
                    <div class="card-body"><canvas id="myChart4"></canvas></div>

                </div>
            </div>
       
    </div>

    </div> 

</div>


<?php footerAdmin($data); ?>