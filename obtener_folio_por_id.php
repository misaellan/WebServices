<?php
/**
 * Obtiene el detalle de un Folio especificado por
 * su identificador "cn_folio"
 */

require 'Folios.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['cn_folio'])) {

        // Obtener parámetro cn_folio
        $parametro = $_GET['cn_folio'];

        // Tratar retorno
        $retorno = Folios::getById($parametro);


        if ($retorno) {

            $folio["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $folio["folio"] = $retorno;
            // Enviar objeto json del folio
            print json_encode($folio);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}

