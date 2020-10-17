<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>Hoteles <span>con vida, </span>equipos que <span>te cuidan</span></h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae magnam minima labore commodi veniam. Error
      officia, labore quo facilis ab architecto nemo quia est, eos doloribus fugit animi ex sit!</p>
  </section>
  <!--seccion-->

  <section class="programa">
    <div class="contenedor-imagen">
      <img src="img/individual.jpg" alt="una cama grande">
    </div>
    <!--contenedor imagen-->

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>CONSIGNAS</h2>

          <?php
    try {
      require_once('includes/funciones/bd_conexion.php');
      $sql = "SELECT * FROM `categoria_consignas` ";
      $resultado = $conn->query($sql);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
    ?>

          <nav class="menu-programa">
            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
              <?php $categoria = $cat['cat_consigna']; ?>
              <a href="#<?php echo strtolower($categoria) ?>">
            <?php echo $categoria ?>
            </a> 

            <?php } ?>

          </nav>

          <?php
    try {
      require_once('includes/funciones/bd_conexion.php');
      $sql = " SELECT id_consigna, nombre_consigna, fecha_consigna, hora_consigna, cat_consigna, nombre_colaborador, apellido_colaborador ";
      $sql .= " FROM consignas ";
      $sql .= " INNER JOIN categoria_consignas ";
      $sql .= " ON consignas.id_cat_consigna = categoria_consignas.id_categoria ";
      $sql .= " INNER JOIN colaboradores ";
      $sql .= " ON consignas.id_colab = colaboradores.id_colaborador ";
      $sql .= "AND consignas.id_cat_consigna = 1 ";
      $sql .= " ORDER BY id_consigna LIMIT 2;";
      $sql .= " SELECT id_consigna, nombre_consigna, fecha_consigna, hora_consigna, cat_consigna, nombre_colaborador, apellido_colaborador ";
      $sql .= " FROM consignas ";
      $sql .= " INNER JOIN categoria_consignas ";
      $sql .= " ON consignas.id_cat_consigna = categoria_consignas.id_categoria ";
      $sql .= " INNER JOIN colaboradores ";
      $sql .= " ON consignas.id_colab = colaboradores.id_colaborador ";
      $sql .= "AND consignas.id_cat_consigna = 2 ";
      $sql .= " ORDER BY id_consigna LIMIT 2;";
      $sql .= " SELECT id_consigna, nombre_consigna, fecha_consigna, hora_consigna, cat_consigna, nombre_colaborador, apellido_colaborador ";
      $sql .= " FROM consignas ";
      $sql .= " INNER JOIN categoria_consignas ";
      $sql .= " ON consignas.id_cat_consigna = categoria_consignas.id_categoria ";
      $sql .= " INNER JOIN colaboradores ";
      $sql .= " ON consignas.id_colab = colaboradores.id_colaborador ";
      $sql .= "AND consignas.id_cat_consigna = 3 ";
      $sql .= " ORDER BY id_consigna LIMIT 2;";
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
    ?>

    <?php $conn->multi_query($sql); ?>

    <?php 
    
    do {
      $resultado = $conn->store_result();
      $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

      <?php $i = 0; ?>
      <?php foreach($row as $consigna): ?>
        <?php if($i % 2 == 0) { ?>
      <div id="<?php echo strtolower($consigna['cat_consigna']) ?>" class="info-entrada ocultar clearfix">
      <?php } ?>
            <div class="detalle-evento">
              <h3><?php echo utf8_encode($consigna['nombre_consigna']) ?></h3>
              <p><i class="fas fa-clock"></i><?php echo $consigna['hora_consigna']; ?></p>
              <p><i class="fas fa-calendar"></i><?php echo $consigna['fecha_consigna']; ?></p>
              <p><i class="fas fa-user"></i><?php echo $consigna['nombre_colaborador'] . " " . $consigna['apellido_colaborador']; ?></p>
            </div>
            
            <?php if($i % 2 == 1): ?>
              <a href="consignas.php" class="boton float-right">Ver todos</a>
          </div>
            <?php endif; ?>
    <?php $i++; ?>
    <?php endforeach; ?>
    <?php $resultado->free(); ?>
   <?php } while ($conn->more_results() && $conn->next_result()); ?>


          <!--consignas-->
        </div>
        <!--programa evento-->
      </div>
      <!--contenedor-->
    </div>
    <!-- contenido programa-->
  </section>
  <!--programa-->

  <section class="habitaciones contenedor seccion">
    <h2 id="nuestras-habs">Nuestras habitaciones</h2>
    <ul class="lista-habitaciones clearfix">
      <li>
        <div class="habitacion">
          <img src="img/individual.jpg" alt="individual">
          <p>DOBLE / UNA CAMA</p>
        </div>
      </li>
      <li>
        <div class="habitacion">
          <img src="img/doscamas.jpeg" alt="dos camas">
          <p>DOBLE / DOS CAMAS</p>
        </div>
      </li>
      <li>
        <div class="habitacion">
          <img src="img/triple.jpg" alt="triple tres camas">
          <p>TRIPLE / TRES CAMAS</p>
        </div>
      </li>
      <li>
        <div class="habitacion">
          <img src="img/triple_doscamas.jpg" alt="triple dos camas">
          <p>TRIPLE / DOS CAMAS</p>
        </div>
      </li>
      <li>
        <div class="habitacion">
          <img src="img/bañera.jpg" alt="bañera">
          <p>BAÑERA</p>
        </div>
      </li>
      <li>
        <div class="habitacion">
          <img src="img/ducha.jpg" alt="ducha">
          <p>PLATO DE DUCHA</p>
        </div>
      </li>
    </ul>
  </section>

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li>
          <p class="numero"></p>Equipo
        </li>
        <li>
          <p class="numero"></p>Pisos
        </li>
        <li>
          <p class="numero"></p>Recepción
        </li>
        <li>
          <p class="numero"></p>Restauración
        </li>
      </ul>
    </div>
  </div>

  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>DOBLE</h3>
            <p class="numero">66€</p>
            <ul>
              <li><i class="fas fa-check"></i>UNA CAMA GRANDE, DOS CAMAS</li>
              <li><i class="fas fa-check"></i>DUCHA/BAÑERA</li>
              <li><i class="fas fa-times"></i>DESAYUNO</li>
              <li><i class="fas fa-times"></i>PARKING</li>
            </ul>
            <a href="#" class="boton hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>INDIVIDUAL</h3>
            <p class="numero">65€</p>
            <ul>
              <li><i class="fas fa-check"></i>UNA CAMA GRANDE</li>
              <li><i class="fas fa-check"></i>DUCHA/BAÑERA</li>
              <li><i class="fas fa-times"></i>DESAYUNO</li>
              <li><i class="fas fa-times"></i>PARKING</li>
            </ul>
            <a href="#" class="boton hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>TRIPLE</h3>
            <p class="numero">77€</p>
            <ul>
              <li><i class="fas fa-check"></i>UNA CAMA GRANDE+IND/TRES CAMAS</li>
              <li><i class="fas fa-check"></i>DUCHA/BAÑERA</li>
              <li><i class="fas fa-times"></i>DESAYUNO</li>
              <li><i class="fas fa-times"></i>PARKING</li>
            </ul>
            <a href="#" class="boton hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <div id="mapa" class="mapa"></div>

  <section class="seccion">
    <h2>Reseñas</h2>
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit ea veritatis amet harum provident
            eius. Distinctio, impedit? Ab fugit saepe pariatur asperiores quas? Assumenda modi distinctio id
            eius? Aut, voluptatem.</p>
          <h3>BOOKING</h3>
        </blockquote>
      </div>
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit ea veritatis amet harum provident
            eius. Distinctio, impedit? Ab fugit saepe pariatur asperiores quas? Assumenda modi distinctio id
            eius? Aut, voluptatem.
          </p>
          <h3>TRUSTYOU</h3>
        </blockquote>
      </div>
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit ea veritatis amet harum provident
            eius. Distinctio, impedit? Ab fugit saepe pariatur asperiores quas? Assumenda modi distinctio id
            eius? Aut, voluptatem.
          </p>
          <h3>BOOKING</h3>
        </blockquote>
      </div>
    </div>
  </section>

  <div class="all parallax">
    <div class="contenido contenedor">
      <p>Registro en</p>
      <h3>Accor Live Limitless</h3>
      <a href="#" class="boton transparent">REGISTRAR</a>
    </div>
  </div>
  <!--registro ALL-->

  <section class="seccion">
    <h2>DISPONIBILIDAD</h2>
    <div class="disponibilidad contenedor">
      <ul class="clearfix">
        <li>
          <p class="numero">10</p>INDIVIDUAL
        </li>
        <li>
          <p class="numero">14</p>DOS CAMAS INDIVIDUALES
        </li>
        <li>
          <p class="numero">11</p>TRES CAMAS
        </li>
        <li>
          <p class="numero">9</p>CAMA GRANDE + INDIVIDUAL
        </li>
        <li>
          <p class="numero">20</p>BAÑERA
        </li>
        <li>
          <p class="numero">50</p>DUCHA
        </li>
      </ul>
    </div>
  </section>

<?php include_once 'includes/templates/footer.php'; ?>