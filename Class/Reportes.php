<?php
class Reportes
{

    public function __construct()
    {
        validarSession();
        require_once 'Class/Conexion.php';
    }



    public function reporteFecha()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            validarRol([1, 3]);
            $conexion = new Conexion();
            $query = "SELECT *FROM ventas WHERE fecha BETWEEN cast('2021-10-02'AS date)AND cast('2021-10-06'AS date)";

            $conexion->bind(':id', $_POST['id_usuarios']);
            $conexion->query($query);
            $reporte = $conexion->getRegistration();
            $datos = (object)array(
                'titulo' => 'Reportes',
                'reporte' => $reporte
            );
            cargarVistas("reportes/reportlist", $datos);

        }else {
            cargarVistas("reportes/creareport",[]);
        }
    }
}
