<?php 

 if(!isset($_POST['submit'])) {
   exit("hubo un error");
 }
 
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


require 'includes/paypal.php';

if(isset($_POST['submit'])):       
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $total = $_POST['total_pedido'];
        $fecha = date('Y-m-d H:i:s');
        // pedidos
        $reservas = $_POST['reservas'];
        $numero_reservas = $reservas;

        $pedido_extra = $_POST['pedido_extra'];
        $desayuno = $_POST['pedido_extra']['desayuno']['cantidad'];
        $precioDesayuno = $_POST['pedido_extra']['desayuno']['precio'];
        $parking = $_POST['pedido_extra']['parking']['cantidad'];
        $precioParking = $_POST['pedido_extra']['parking']['precio'];
        include_once 'includes/funciones/funciones.php';
        $pedido = productos_json($reservas, $desayuno, $parking);
        // reservas
        $compras = $_POST['registro'];
        $registro = reservas_json($compras);
        try {
        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, reservas_extras, reservas_registrados, total_pagado, pagado) VALUES (?,?,?, NOW(),?,?,?,0)");
        $stmt->bind_param("ssssss", $nombre, $apellido, $email, $pedido, $registro, $total);
        $stmt->execute();
        $ID_registro = $stmt->insert_id;
        $stmt->close();
        $conn->close();
        // header('Location: validar_registro.php?exitoso=1');
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
  endif;
   

$compra = new Payer();
$compra->setPaymentMethod('paypal');


$articulo = new Item();
$articulo->setName($producto)
      ->setCurrency('EUR')
      ->setQuantity(1)
      ->setPrice($precio);

      $i = 0;
      $arreglo_pedido = array();
      foreach($numero_reservas as $key => $value) {
        if( (int) $value['cantidad'] > 0 ) {
          
          ${"articulo$i"} = new Item();
          $arreglo_pedido[] = ${"articulo$i"};
          ${"articulo$i"}->setName('Reserva: ' . $key)
                          ->setCurrency('EUR')
                          ->setQuantity( (int) $value['cantidad'] )
                          ->setPrice( (int) $value['precio'] );
          $i++;
        }
      }

      foreach($pedido_extra as $key => $value) {
        if( (int) $value['cantidad'] > 0 ) {
          
          ${"articulo$i"} = new Item();
          $arreglo_pedido[] = ${"articulo$i"};
          ${"articulo$i"}->setName('Extras: ' . $key)
                          ->setCurrency('EUR')
                          ->setQuantity( (int) $value['cantidad'] )
                          ->setPrice( (int) $value['precio'] );
          $i++;
        }
      }

$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);

$cantidad = new Amount();
$cantidad->setCurrency('EUR')
          ->setTotal($total);

$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
               ->setItemList($listaArticulos)
               ->setDescription('Pago reserva ')
               ->setInvoiceNumber($ID_registro);

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$ID_registro}");
              
          
$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));
     
     try {
       $pago->create($apiContext);
     } catch (PayPal\Exception\PayPalConnectionException $pce) {
       // Don't spit out errors or use "exit" like this in production code
       echo '<pre>';print_r(json_decode($pce->getData()));exit;echo'</pre>';
   }

$aprobado = $pago->getApprovalLink();


header("Location: {$aprobado}");