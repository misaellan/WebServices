<?php
/**
 * Actualiza un folio especificado por su identificador
 */

require 'Folios.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar folio
    $retorno = Folios::update(
        $body['cn_folio'],
        $body['cn_entregas'],
        $body['cf_inicioruta'],
        $body['cf_finruta'],
        $body['cn_viaje'],
		$body['cv_unidad'],
		$body['cv_localidad'],
		$body['cn_kminicial'],
		$body['cn_kmfinal'],
		$body['cn_cilindros'],
		$body['cn_estacionamiento'],
		$body['cn_combustible'],
		$body['cn_peaje'],
		$body['cn_medico'],
		$body['cn_taxi'],
		$body['cn_hospedaje'],
		$body['cv_otros'],
		$body['cn_importe']
    );

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Actualizacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se actualizo el registro"));
		echo $json_string;
    }
}
?>
