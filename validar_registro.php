    <?php if(isset($_POST['submit'])):       
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $total = $_POST['total_pedido'];
        $fecha = date('Y-m-d H:i:s');
        // pedidos
        $reservas = $_POST['reservas'];
        $desayuno = $_POST['pedido_deb'];
        $parking = $_POST['pedido_pk'];
        include_once 'includes/funciones/funciones.php';
        $pedido = productos_json($reservas, $desayuno, $parking);
        // reservas
        $reservas = $_POST['registro'];
        $registro = reservas_json($reservas);
        try {
      require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, reservas_extras, reservas_registrados, total_pagado) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $nombre, $apellido, $email, $fecha, $pedido, $registro, $total);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header('Location: validar_registro.php?exitoso=1');
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
    ?>
    <?php endif; ?>
<?php include_once 'includes/templates/header.php'; ?>
<section class="seccion contenedor">
    <h2>Resumen registro</h2>

    <?php if(isset($_GET['exitoso'])): 
        if($_GET['exitoso'] == "1"):
            echo "Registro exitoso";
        endif;
    endif; ?>


   
</section>

<?php include_once 'includes/templates/footer.php'; ?>