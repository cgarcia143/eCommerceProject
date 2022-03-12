<?php 

class Home
{
    public function __construct()
    {
        validateSessionStarted();
        require_once 'Class/Conexion.php';
        
    }



    public function listar()
    {
        // 1. crear conexion 
        $conexion = new Conexion();
        // 2. armar query 
        $query = "SELECT p.id_producto, p.nombre as pronombre, c.nombre AS canombre, p.precio, p.descripcion, pr.nombre AS prproveedor, p.estado, p.imagen FROM producto p INNER JOIN categoria_producto c ON p.categoria=c.id_categoria INNER JOIN proveedores pr ON p.proveedor=pr.id_pro";
        // 3. preparar datos 
        $conexion->query($query);
        // 4. ejecutar
        $productos = $conexion->getLogs();
        // 5. pasar datos a la vista
        $datos = (object)Array(
            'titulo' => 'algo',
            'productos' => $productos
        );
        cargarVistasPublicas('home/homeView', $datos);
    }

    public function detailProduct()
    {
        $conexion = new Conexion();
        $query = "SELECT p.id_producto, p.nombre as pronombre, c.nombre AS canombre, p.precio, p.descripcion, pr.nombre AS prproveedor, p.estado, p.imagen FROM producto p INNER JOIN categoria_producto c ON p.categoria=c.id_categoria INNER JOIN proveedores pr ON p.proveedor=pr.id_pro WHERE p.id_producto = :id";
        $conexion->query($query);
        $conexion->bind(':id', $_GET['id']);
        $producto = $conexion->getRegistration();
        $datos = (object)array(
            'titulo' => 'Detalle producto',
            'producto' => $producto
        );
        cargarVistasPublicas('public/detailProduct', $datos);
    }

}