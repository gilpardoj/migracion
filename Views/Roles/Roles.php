
<?= 
  headerAdmin();
  navAdmin();
  getModal("ModalsRoles", $data);
?>
<div id="contentAjax"></div>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>
            <i class="bi bi-speedometer"></i> <?=$data["page_title"];?>
            <button class="btn btn-primary" type="button" onclick="openModal();"><i class="bi bi-plus-lg"></i> Nuevo</button>
          </h1>
          <p>Gestión de roles</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="<?=base_url();?>roles"><?=$data["page_title"];?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableRoles">
                  <thead>
                    <tr>
                      <th>IdRol</th>
                      <th>Nombre Rol</th>
                      <th>Descripción</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
</div>
     <!-- Page specific javascripts-->
    
    <?=footerAdmin();?>
   
    