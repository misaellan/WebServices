<?php

/**
 * Representa el la estructura de las Folios
 * almacenadas en la base de datos
 */
require 'Database.php';

class Folios
{
    function __construct()
    {
    }

    /**
     * Retorna en la fila especificada de la tabla 'o_folios_tc'
     *
     * @param $cn_folio Identificador del registro
     * @return array Datos del registro
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM o_folios_tc";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Obtiene los campos de un Folio con un identificador
     * determinado
     *
     * @param $cn_folio Identificador del folio
     * @return mixed
     */
    public static function getById($cn_folio)
    {
        // Consulta de la tabla o_folios_tc
        $consulta = "SELECT pv_folio_tc,
                            cf_fecha,
                            fn_usuario,
                            fn_operador,
                            cn_folio,
                            cn_entregas,
                            cf_inicioruta,
                            cf_finruta,
                            cn_viaje,
                            cv_unidad,
                            cv_localidad,
                            cn_kminicial,
                            cn_kmfinal,
                            cn_cilindros,
                            cn_estacionamiento,
                            cn_combustible,
                            cn_peaje,
                            cn_medico,
                            cn_taxi,
                            cn_hospedaje,
                            cv_otros,
                            cn_importe,
                            cn_folio_fisico
                            FROM o_folios_tc
                            WHERE cn_folio = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($cn_folio));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $cn_folio         identificador
     * @param $fn_operador      nuevo fn_operador
     * @param $cf_fecha        nueva cf_fecha
     
     */
    public static function update(
        $cn_folio,
        $cn_entregas,
        $cf_inicioruta,
        $cf_finruta,
        $cn_viaje,
        $cv_unidad,
        $cv_localidad,
        $cn_kminicial,
		$cn_kmfinal,
		$cn_cilindros,
		$cn_estacionamiento,
		$cn_combustible,
		$cn_peaje,
		$cn_medico,
		$cn_taxi,
		$cn_hospedaje,
        $cv_otros,
        $cn_importe
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE o_folios_tc SET cn_entregas=?,cf_inicioruta=?,cf_finruta=?,cn_viaje=?, cv_unidad=?, 	cv_localidad=?, cn_kminicial=?,cn_kmfinal=?,cn_cilindros=?,cn_estacionamiento=?,cn_combustible=?,cn_peaje=?,cn_medico=?,cn_taxi=?,cn_hospedaje=?, 	 	cv_otros=?, 	cn_importe=?  WHERE cn_folio=? ";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array(
                $cn_entregas,
                $cf_inicioruta,
                $cf_finruta,
                $cn_viaje,
                $cv_unidad,
                $cv_localidad,
                $cn_kminicial,
        		$cn_kmfinal,
        		$cn_cilindros,
        		$cn_estacionamiento,
        		$cn_combustible,
        		$cn_peaje,
        		$cn_medico,
        		$cn_taxi,
        		$cn_hospedaje,
                $cv_otros,
                $cn_importe,
                $cn_folio
                ));
        return $cmd;
    }

    /**
     * Insertar un nuevo Folio
     *
     * @param $fn_operador      fn_operador del nuevo registro
     * @param $cf_fecha dirección del nuevo registro
     * @return PDOStatement
     */
    public static function insert(
                $pv_folio_tc,
                $cf_fecha,
                $fn_usuario,
                $fn_operador,
                $cn_folio,
                $cn_entregas,
                $cf_inicioruta,
                $cf_finruta,
                $cn_viaje,
                $cv_unidad,
                $cv_localidad,
                $cn_kminicial,
                $cn_kmfinal,
                $cn_cilindros,
                $cn_estacionamiento,
                $cn_combustible,
                $cn_peaje,
                $cn_medico,
                $cn_taxi,
                $cn_hospedaje,
                $cv_otros,
                $cn_importe,
                $cn_folio_fisico
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO o_folios_tc ( " .
            "pv_folio_tc," .
            "cf_fecha," .
            "fn_usuario," .
            "fn_operador," .
            "cn_folio," .
            "cn_entregas," .
            "cf_inicioruta," .
            "cf_finruta," .
            "cn_viaje," .
            "cv_unidad," .
            "cv_localidad," .
            "cn_kminicial," .
            "cn_kmfinal," .
            "cn_cilindros," .
            "cn_estacionamiento," .
            "cn_combustible," .
            "cn_peaje," .
            "cn_medico," .
            "cn_taxi," .
            "cn_hospedaje," .
            "cv_otros," .
            "cn_importe," .
            "cn_folio_fisico)" .
            " VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $pv_folio_tc,
                $cf_fecha,
                $fn_usuario,
                $fn_operador,
                $cn_folio,
                $cn_entregas,
                $cf_inicioruta,
                $cf_finruta,
                $cn_viaje,
                $cv_unidad,
                $cv_localidad,
                $cn_kminicial,
                $cn_kmfinal,
                $cn_cilindros,
                $cn_estacionamiento,
                $cn_combustible,
                $cn_peaje,
                $cn_medico,
                $cn_taxi,
                $cn_hospedaje,
                $cv_otros,
                $cn_importe,
                $cn_folio_fisico)
        );

    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $cn_folio identificador de la tabla o_folios_tc
     * @return bool Respuesta de la eliminación
     */
    public static function delete($cn_folio)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM o_folios_tc WHERE cn_folio=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($cn_folio));
    }
}

?>