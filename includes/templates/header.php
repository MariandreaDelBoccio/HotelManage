<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Intranet - Ibis Santa Coloma</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Oswald:wght@400;600;700&family=PT+Sans:wght@400;700&display=swap"
    rel="stylesheet">

    <?php
      $archivo = basename($_SERVER['PHP_SELF']);
      $pagina = str_replace(".php", "", $archivo);
      if($pagina == 'colaboradores'){
        echo '<link rel="stylesheet" href="css/colorbox.css">';
      } 
    ?>


  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="css/main.css">
  

  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix fecha-hora">
            <p class="fecha"><i class="fas fa-calendar-alt"></i><?php echo date('l, F jS'); ?></p>
            <p class="ciudad"><i class="fas fa-map-marked-alt"></i> Barcelona, ESP</p>
          </div>

          <div class="nombre-slogan">
            <h1 class="nombre-sitio">HOTEL IBIS SANTA COLOMA</h1>
            <p class="slogan">Intranet</p>
          </div>
        </div>
        <!--información evento-->

      </div>
    </div>
    <!--hero-->
  </header>

  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php"><img src="img/logo.png" alt="logo"></a>
      </div>

      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>


      <nav class="navegacion-principal">
        <a href="habitaciones.php">Habitaciones</a>
        <a href="planning.php">Planning</a>
        <a href="consignas.php">Consignas</a>
        <a href="reservas.php">Reservas</a>
      </nav>
    </div>
    <!--contenedor-->
  </div>
  <!--barra-->