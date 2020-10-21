<?php 

require 'paypal/autoload.php';

//url aquispe
define('URL_SITIO', 'http://localhost:8888/intranet-hotel');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'Ac1FGV6lHiaSEuovFqHwTYjWR17gRNzFKTBYipq6p14jLjMsyxosYwiamORLbNl7Qm6xCcAeU_SnLbOY',     // ClientID
        'EFvmyLmv2j2t1GxvxOEeV-1O7Nv2SywUKgGIx4tZya4G1prTCZs31lck6LtnNcJx0TSEnnUoVXcVaZCA'      // ClientSecret
    )
);

