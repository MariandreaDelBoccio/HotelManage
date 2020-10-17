<?php 

function productos_json(&$reservas, &$desayuno = 0, &$parking = 0) {
    $habs = array(0 => 'doble', 1 => 'individual', 2 => 'triple');

    unset( $reservas['doble']['precio'] );
    unset( $reservas['individual']['precio'] );
    unset( $reservas['triple']['precio'] );

    $total_reserva = array_combine($habs, $reservas);
    $json = array();

    foreach($total_reserva as $key => $reservas):
        if((int) $reservas > 0):
            $json[$key] = (int) $reservas;
        endif;
    endforeach;

    $desayuno = (int) $desayuno;
    if($desayuno > 0):
        $json['desayuno'] = $desayuno;
    endif;

    $parking = (int) $parking;
    if($parking > 0):
        $json['parking'] = $parking;
    endif;

    return json_encode($json);

}

function reservas_json(&$reservas) {
    $reservas_json = array();
    foreach($reservas as $reserva):
        $reservas_json['reservas'][] = $reserva;
    endforeach;

    return json_encode($reservas_json);
}

?>