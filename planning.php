<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>Planning</h2>

    <?php
    try {
      require_once('includes/funciones/bd_conexion.php');
      $sql = " SELECT * FROM `colaboradores` ";
      $resultado = $conn->query($sql);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
    ?>

    <section class="colaboradores contenedor seccion">
          <h2>Nuestros colaboradores</h2>
          <ul class="lista-colaboradores clearfix">

      <?php while($colaboradores = $resultado->fetch_assoc() ) { ?>

            <li>
              <div class="colaborador">
                <a class="colaborador-info" href="#colaborador<?php echo $colaboradores['id_colaborador']; ?>">
                <p><?php echo $colaboradores['nombre_colaborador'] . " " . $colaboradores['apellido_colaborador'] ?></p>
                </a>
              </div>
            </li>

            <div style="display:none;">
            <div class="colaborador-info" id="colaboradorx<?php echo $colaboradores['id_colaborador']; ?>">
            <h2><?php echo $colaboradores['nombre_colaborador'] . " " . $colaboradores['apellido_colaborador']; ?></h2>
            <p><?php echo $colaboradores['puesto']; ?></p>
          </div>
          </div>

 <?php } // while ?>

          </ul>
    </section>
    

    <?php 
    
      $conn->close();

    ?>

  </section>

  <?php include_once 'includes/templates/footer.php'; ?>