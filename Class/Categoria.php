<?php

class Categoria implements ClassModel
{

    public function __construct()
    {
        validarSession();
        require_once 'Class/Conexion.php';
    }

    public function list()
    {
        validarRol([1, 3]);
        //crear la conexion
        $conexion = new Conexion();

        //Armando consulta
        $consulta = "SELECT * FROM categoria_producto";

        //preparas los datos
        $conexion->query($consulta);

        //ejecutar consulta
        $categorias = $conexion->getLogs();

        //mostrar los datos
        $datos = (object)array(
            'titulo' => 'Categoria Productos',
            'categoriaproductos' => $categorias
        );

        cargarVistas('categoria/list', $datos);
    }

    public function create()
    {

        //crear la conexion
        $conexion = new Conexion();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Armando consulta
            $query = "INSERT INTO categoria_producto(id_categoria, nombre, descripcion) VALUES (NULL,:nombre, :descripcion);";
            $consulta = "SELECT nombre FROM categoria_producto WHERE nombre = :nombre";
            $conexion->query($consulta);
            $conexion->bind(':nombre', $_POST['nombre']);
            $registro = $conexion->getRegistration();

            if ($registro == null) {
                $conexion->query($query);
                //preparas los datos
                $conexion->bind(':nombre', $_POST['nombre']);
                $conexion->bind(':descripcion', $_POST['descripcion']);
                //ejecutar consulta
                $insertar = $conexion->execute();
                //mostrar los datos
                if ($insertar) {
                    redirect('?clase=categoria&metodo=list&notificacion=createCategoria');
                }
            }else{
                redirect('?clase=categoria&metodo=create&notificacion=yaExisteEstaCategoria');
            }
        } else {
            cargarVistas('categoria/create', $datos = []);
        }
    }
    public function edit()
    {
        //crear la conexion
        $conexion = new Conexion();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Armando consulta
            $query = "UPDATE categoria_producto SET nombre = :nombre, descripcion = :descripcion WHERE id_categoria = :id";

            $conexion->query($query);

            //preparas los datos
            $conexion->bind(':id', $_POST['id_categoria']);
            $conexion->bind(':nombre', $_POST['nombre']);
            $conexion->bind(':descripcion', $_POST['descripcion']);

            //ejecutar consulta
            $actualizar = $conexion->execute();

            //mostrar los datos
            if ($actualizar) {
                redirect('?clase=Categoria&metodo=list&notificacion=upDateCategoria');
            }
        } else {
            $conexion = new Conexion();
            $consulta = "SELECT * FROM categoria_producto WHERE id_categoria = :id";
            $conexion->query($consulta);
            $conexion->bind(':id', $_GET['id']);
            $categorias = $conexion->getRegistration();
            //$categorias = $conexion->getLogs();
            $datos = (object)array(
                'titulo' => 'Categorias',
                'categoriaupdate' => $categorias
            );
            cargarVistas('categoria/edit', $datos);
        }
    }
    public function delete()
    {
        //crear la conexion
        $conexion = new Conexion();
        //Armando consulta
        $consulta = "DELETE FROM categoria_producto WHERE id_categoria = :id";
        //preparas los datos
        $conexion->query($consulta);
        $conexion->bind(':id', $_GET['id']);
        $resultado = $conexion->execute();
        redirect('?clase=Categoria&metodo=list&notificacion=deleteCategoria');
    }
}
