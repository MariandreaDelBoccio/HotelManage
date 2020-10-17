<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>Consignas</h2>

    <?php
    try {
      require_once('includes/funciones/bd_conexion.php');
      $sql = " SELECT id_consigna, nombre_consigna, fecha_consigna, hora_consigna, cat_consigna, nombre_colaborador, apellido_colaborador ";
      $sql .= " FROM consignas ";
      $sql .= " INNER JOIN categoria_consignas ";
      $sql .= " ON consignas.id_cat_consigna = categoria_consignas.id_categoria ";
      $sql .= " INNER JOIN colaboradores ";
      $sql .= " ON consignas.id_colab = colaboradores.id_colaborador ";
      $sql .= " ORDER BY id_consigna ";
      $resultado = $conn->query($sql);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
    ?>

    <div class="calendario">

    <div class="calendario">
      <?php
      $calendario = array();
        while($consignas = $resultado->fetch_assoc() ) { 

          $fecha = $consignas['fecha_consigna'];
          $categoria = $consignas['cat_consigna'];

          $consigna = array(
              'titulo' => $consignas['nombre_consigna'],
              'fecha' => $consignas['fecha_consigna'],
              'hora' => $consignas['hora_consigna'],
              'categoria' => $consignas['cat_consigna'],
              'colaborador' => $consignas['nombre_colaborador'] . " " . $consignas['apellido_colaborador']
          );

          $calendario[$fecha][] = $consigna;
          
          ?>


 <?php } // while ?>

 <?php

          foreach($calendario as $dia => $lista_consignas) { ?>
            <h3>
            
            <i class="fa fa-calendar"></i>
            <?php 
            
            echo strftime( "%A, %d de %B del %Y", strtotime($dia) ); ?>
            
            </h3>

            <?php foreach($lista_consignas as $consigna) { ?>

            <div class="dia">
            
              <p class="titulo"><?php echo $consigna['titulo']; ?></p>
              <p class="hora">
              <i class="fa fa-clock-o" aria-hidden="true"></i>
              <?php echo $consigna['fecha'] . " " . $consigna['hora']; ?>
              </p>
              <p><?php echo $consigna['categoria']; ?></p>
              <p>
              <i class="fa fa-user" aria-hidden="true"></i>
              <?php echo $consigna['colaborador']; ?>
              </p>

            </div>

            <?php } // fin foreach consignas ?>

        <?php  } // fin foreach dias ?>

      

      
    </div>

    </div> 

    <?php 
    
      $conn->close();

    ?>

  </section>

  <?php include_once 'includes/templates/footer.php'; ?>