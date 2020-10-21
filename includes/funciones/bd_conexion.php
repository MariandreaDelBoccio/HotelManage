<?php
    $conn = new mysqli('localhost', 'root', 'root', 'intranet_hotel');

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>