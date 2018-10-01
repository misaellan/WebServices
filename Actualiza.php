<?php
require("config.inc.php");
if (!empty($_POST)) {
    //obteneos los usuarios respecto a la usuario que llega por parametro
    $query ="SELECT cf_fecha,fn_usuario,fn_operador,cn_folio,cn_entregas,cf_inicioruta,cf_finruta,cn_viaje,cv_unidad,cv_localidad,cn_kminicial,cn_kmfinal,cn_cilindros,cn_estacionamiento,cn_combustible,cn_peaje,cn_medico,cn_taxi,cn_hospedaje,cv_otros,cn_importe,cn_folio_fisico FROM   o_folios_tc WHERE cn_folio =:cn_folio"; 
        $query_params = array(':username' => $_POST['username']);
            echo json_encode($query_params);

    try {
        $stmt   = $db->prepare($query);
        echo json_encode($query_params);

    }
    catch (PDOException $ex) {
        
        $response["success"] = 0;
        $response["message"] = "Problema con la base de datos, vuelve a intetarlo";
        die(json_encode($response));
        
    }   
}