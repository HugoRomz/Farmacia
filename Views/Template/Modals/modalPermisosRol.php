<div id="contentAjax"></div>
<div class="modal fade modalPermisosRol" id="modalPermisosRol" name="modalPermisosRol" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Permisos Roles de Usuario</h3>
                <button type="button" class="btn-cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formPermisos" name="formPermisos">
            <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required="">
                <div class="modal-body">
                    <?php
                        // dep($data);
                    ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Módulos</th>
                                    <th>Leer</th>
                                    <th>Escribir</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $modulos= $data['modulos'];
                                    for ($i=0; $i < count($modulos); $i++) { 
                                        $permisos = $modulos[$i]['permisos'];
                                        $rCheck = $permisos['r'] == 1 ? " checked " : "";
                                        $wCheck = $permisos['w'] == 1 ? " checked " : "";
                                        $uCheck = $permisos['u'] == 1 ? " checked " : "";
                                        $dCheck = $permisos['d'] == 1 ? " checked " : "";
    
                                        $idmod = $modulos[$i]['idmodulo'];
                                ?>

                                <tr>
                                    <td><?php $no;?>
                                        <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>"
                                            required>
                                    </td>
                                    <td><?= $modulos[$i]['titulo']; ?></td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" name="modulos[<?= $i; ?>][r]"
                                                    <?= $rCheck ?>><span class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" name="modulos[<?= $i; ?>][w]"
                                                    <?= $wCheck ?>><span class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" name="modulos[<?= $i; ?>][u]"
                                                    <?= $uCheck ?>><span class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                            <label>
                                                <input type="checkbox" name="modulos[<?= $i; ?>][d]"
                                                    <?= $dCheck ?>><span class="flip-indecator" data-toggle-on="ON"
                                                    data-toggle-off="OFF"></span>
                                            </label>
                                        </div>
                                    </td>

                                </tr>
                                <?php

                                $no++;
                              }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <center>
                        <input class="btn-guardar" type="submit" value="Guardar" />
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>