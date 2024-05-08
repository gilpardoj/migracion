<div class="modal fade modalPermisos"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permisos Roles: <?=$data['rol'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <span aria-hidden="true"></span>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="tile">
              <form action="" id="formPermisos" name="formPermisos">
                <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required=""> 
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Módulo</th>
                          <th>Ver</th>
                          <th>Crear</th>
                          <th>Actualizar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $no=1;
                            $modulos = $data['modulos'];
                            for ($i=0; $i < count($modulos); $i++) { 

                                $permisos = $modulos[$i]['permisos'];
                                $rCheck = $permisos['r'] == 1 ? " checked " : "";
                                $wCheck = $permisos['w'] == 1 ? " checked " : "";
                                $uCheck = $permisos['u'] == 1 ? " checked " : "";
                                $dCheck = $permisos['d'] == 1 ? " checked " : "";
                                $idmod = $modulos[$i]['idmodulo'];
                        ?>
                        <tr>
                          <td>
                              <?= $no; ?>
                              <input type="hidden" id="modulos[<?= $i; ?>][imodulo]" value="<?= $idmod ?>" required >
                          </td>
                          <td>
                              <?= $modulos[$i]['titulo']; ?>
                          </td>
                          <td>
                            <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][r]" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?> >
                              <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][r]"> </label>
                          </td>
                          <td>
                            <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][w]" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?> >
                              <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][w]"> </label> 
                          </td>
                          <td>
                            <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][u]" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?> >
                              <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][u]"> </label> 
                          </td>
                          <td>
                            <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][d]" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?> >
                              <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][d]"> </label>
                          </td>
                        </tr>
                            <?php $no++;
                              }
                            ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" aria-hidden="true">Guardar</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>