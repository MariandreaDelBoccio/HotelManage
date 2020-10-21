<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>Reservas</h2>
    <form id="registro" class="registro" action="pagar.php" method="POST">
      <div id="datos_usuario" class="registro caja clearfix">
        <div class="campo">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" placeholder="nombre">
        </div>
        <div class="campo">
          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" placeholder="apellido">
        </div>
        <div class="campo">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="email">
        </div>
        <div id="error"></div>
      </div>
      <!--datos usuario-->

      <div id="paquetes" class="paquetes">
        <h3>Elige el tipo de habitación</h3>
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
              <div class="orden">
                <label for="doble">Cantidad:</label>
                <input type="number" min="0" id="doble" size="3" name="reservas[doble][cantidad]" placeholder="0">
                <input type="hidden" value="66" name="reservas[doble][precio]">
              </div>
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
              <div class="orden">
                <label for="individual">Cantidad:</label>
                <input type="number" min="0" id="individual" size="3" name="reservas[individual][cantidad]" placeholder="0">
                <input type="hidden" value="65" name="reservas[individual][precio]">
              </div>
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
              <div class="orden">
                <label for="triple">Cantidad:</label>
                <input type="number" min="0" id="triple" size="3" name="reservas[triple][cantidad]" placeholder="0">
                <input type="hidden" value="77" name="reservas[triple][precio]">
              </div>
            </div>
          </li>
        </ul>
      </div>

      <div id="camas" class="camas clearfix">
        <h3>Elige las camas</h3>
        <div class="caja">
          <div id="hab_doble" class="contenido-camas clearfix">
            <h4>Doble</h4>
            <div>
              <p>Camas:</p>
              <label><input type="checkbox" name="registro[]" id="cama_01" value="cama_01">
                Una cama matrimonial</label>
              <label><input type="checkbox" name="registro[]" id="cama_02" value="cama_02">
                Dos camas individuales</label>
            </div>
            <div>
              <p>Servicios:</p>
              <label><input type="checkbox" name="registro[]" id="tina_01" value="tina_01">
                Bañera</label>
              <label><input type="checkbox" name="registro[]" id="ducha_01" value="ducha_01">
                Plato de ducha</label>
            </div>
          </div>
          <!--#doble-->
          <div id="hab_individual" class="contenido-camas clearfix">
            <h4>Individual</h4>
            <div>
              <p>Camas:</p>
              <label><input type="checkbox" name="registro[]" id="cama_01" value="cama_01">
                Una cama matrimonial</label>
              <label><input type="checkbox" name="registro[]" id="cama_02" value="cama_02">
                Dos camas individuales</label>
            </div>
            <div>
              <p>Servicios:</p>
              <label><input type="checkbox" name="registro[]" id="tina_01" value="tina_01">
                Bañera</label>
              <label><input type="checkbox" name="registro[]" id="ducha_01" value="ducha_01">
                Plato de ducha</label>
            </div>
          </div>
          <!--#individual-->
          <div id="hab_triple" class="contenido-camas clearfix">
            <h4>Triple</h4>
            <div>
              <p>Camas:</p>
              <label><input type="checkbox" name="registro[]" id="cama_01" value="cama_01">
                Una cama matrimonial + plegatín</label>
              <label><input type="checkbox" name="registro[]" id="cama_02" value="cama_02">
                Dos camas individuales + plegatín</label>
            </div>
            <div>
              <p>Servicios:</p>
              <label><input type="checkbox" name="registro[]" id="tina_01" value="tina_01">
                Bañera</label>
              <label><input type="checkbox" name="registro[]" id="ducha_01" value="ducha_01">
                Plato de ducha</label>
            </div>
          </div>
          <!--#triple-->
        </div>
        <!--.caja-->
      </div>
      <!--#camas-->

      <div id="resumen" class="resumen clearfix">
        <h3>Pago y extras</h3>
        <div class="caja clearfix">
          <div class="extras">
            <div class="orden">
              <label for="desayuno">Desayuno 6.90€</label>
              <input type="number" min="0" id="desayuno" name="pedido_extra[desayuno][cantidad]" size="3" placeholder="0">
              <input type="hidden" value="6.90" name="pedido_extra[desayuno][precio]">
            </div>
            <!--desayuno-->
            <div class="orden">
              <label for="parking">Parking 10€</label>
              <input type="number" min="0" id="parking" name="pedido_extra[parking][cantidad]" size="3" placeholder="0">
              <input type="hidden" value="10" name="pedido_extra[parking][precio]">
            </div>
            <!--parking-->

            <input type="button" id="calcular" class="boton" value="Calcular">
          </div>
          <!--extras-->

          <div class="total">
            <p>Resumen:</p>
            <div id="lista-productos">

            </div>
            <p>Total:</p>
            <div id="suma-total">

            </div>
            <input type="hidden" name="total_pedido" id="total_pedido">
            <input type="submit" name="submit" id="btnRegistro" class="boton" value="Pagar">

          </div>
        </div>
      </div>
    </form>
  </section>


  <?php include_once 'includes/templates/footer.php'; ?>
