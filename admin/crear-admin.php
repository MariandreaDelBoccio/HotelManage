<?php 
      include_once 'funciones/sesiones.php';
      include_once 'funciones/funciones.php';
      include_once 'templates/header.php';
      include_once 'templates/barra.php'; 
      include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear adminitrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <div class="row">
    <div class="col-md-8 ml-3">

    <section class="content">
      <div class="card">
              <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-admin.php">
         <div class="card-body">       
                  <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Enter user">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter full name">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>    
                 </div>
                <!-- /.card-body -->   
               <div class="card-footer">
                 <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
              </form>  
      </div>
    </section>
    </div>
  </div>


  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>