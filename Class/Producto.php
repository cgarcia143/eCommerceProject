<?php

class Producto implements ClassModel
{
    public function __construct()
    {
        validarSession();
        require_once 'Class/Conexion.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
            //print_r($_FILES);

            $conexion = new Conexion();
            $directorio = Upload();
            if ($directorio != null) {
                $conexion->query("INSERT INTO producto (codigo,nombre,categoria,precio,descripcion,proveedor,estado,stock,imagen) VALUES (:codigo,:nombre,:categoria,:precio,:descripcion,:proveedor,:estado,:stock,:imagen)");
                //binding values
                $conexion->bind(':codigo', $_POST['codigo']);
                $conexion->bind(':nombre', $_POST['nombre']);
                $conexion->bind(':categoria', $_POST['categoria']);
                $conexion->bind(':precio', $_POST['precio']);
                $conexion->bind(':descripcion', $_POST['descripcion']);
                $conexion->bind(':proveedor', $_POST['proveedor']);
                $conexion->bind(':estado', $_POST['estado']);
                $conexion->bind(':stock', $_POST['stock']);
                $conexion->bind(':imagen', $directorio);
                $resultado = $conexion->execute();

                if ($resultado) {
                    redirect('?clase=producto&metodo=list&notificacion=agregado');
                }
            } else {
                redirect('?clase=producto&metodo=create&notificacion=LaImagenNoCargo');
            }
        } else {
            $conexion = new Conexion();
            $conexion->query("SELECT id_categoria, nombre FROM categoria_producto");
            $categorias = $conexion->getLogs();

            $conexion->query("SELECT id_pro, nombre FROM proveedores");
            $proveedores = $conexion->getLogs();
            $datos = (object)array(
                "categorias" => $categorias,
                "proveedores" => $proveedores
            );

            cargarVistas('producto/create', $datos);
        }
    }

    public function list()
    {
        validarRol([1, 3]);
        $conexion = new Conexion();
        $query = "SELECT p.id_producto,p.codigo, p.nombre as pronombre, c.nombre AS canombre, p.precio, p.descripcion, pr.nombre AS prproveedor, p.estado,p.stock, p.imagen FROM producto p INNER JOIN categoria_producto c ON p.categoria=c.id_categoria INNER JOIN proveedores pr ON p.proveedor=pr.id_pro";

        $conexion->query($query);
        $productos = $conexion->getLogs();
        $datos = (object)array(
            'titulo' => 'Productos',
            'productos' => $productos
        );
        cargarVistas("producto/productoView", $datos);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            /* var_dump($_FILES["imagen"]); */

            $conexion = new Conexion();
            $directorio = $_FILES['imagen']['size'] > 0 ? Upload() : $_POST['urlImg'];
            $conexion->query("UPDATE  producto SET codigo = :codigo, nombre = :nombre, categoria = :categoria, precio = :precio, descripcion = :descripcion, proveedor = :proveedor,estado = :estado, stock=:stock, imagen= :imagen WHERE id_producto=:id");
            //binding values
            $conexion->bind(':id', $_POST['id_producto']);
            $conexion->bind(':codigo', $_POST['codigo']);
            $conexion->bind(':nombre', $_POST['nombre']);
            $conexion->bind(':categoria', $_POST['categoria']);
            $conexion->bind(':precio', $_POST['precio']);
            $conexion->bind(':descripcion', $_POST['descripcion']);
            $conexion->bind(':proveedor', $_POST['proveedor']);
            $conexion->bind(':estado', $_POST['estado']);
            $conexion->bind(':stock', $_POST['stock']);
            $conexion->bind(':imagen', $directorio);
            $resultado = $conexion->execute();
            

            if ($resultado) {
                redirect('?clase=producto&metodo=list&notificacion=updatePrducto');
            }

        } else {
            $conexion = new Conexion();
            $conexion->query("SELECT id_categoria, nombre FROM categoria_producto");
            $categorias = $conexion->getLogs();
            $conexion->query("SELECT id_pro, nombre FROM proveedores");
            $proveedores = $conexion->getLogs();
            $conexion->query("SELECT *FROM producto WHERE id_producto = :id ");
            $conexion->bind(':id', $_GET['id'] ? $_GET['id'] : $_POST['id_producto']);
            //validacion si resultado no trae nada
            $resultado = $conexion->getRegistration();
            $datos = (object)array(
                'titulo' => 'Productos',
                'datosUpdate' => $resultado,
                'proveedores' => $proveedores,
                'categorias' => $categorias
            );
            cargarVistas('producto/edit', $datos);
        }
    }

    public function delete()
    {

        $conexion = new Conexion();
        $conexion->query("DELETE FROM producto WHERE id_producto = :id");
        $conexion->bind(':id', $_GET['id']);
        $resultado = $conexion->execute();
        redirect('?clase=producto&metodo=list&notificacion=eliminado');
    }

    public function state()
    {
        $conexion = new Conexion();
        $estado1 = 1;
        $estado2 = 2;
        $conexion->query("UPDATE  producto SET estado = :estado WHERE id_producto=:id");
        $conexion->bind(':id', $_GET['id']);
        $conexion->bind(':estado', $estado1, $estado2);
    }
}
