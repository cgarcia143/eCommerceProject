<?php
// Funciones de ayuda para Session
function validateSessionStarted()
{
        if (session_status() == PHP_SESSION_NONE) {
                session_start();
        }
}

function validarSession()
{
        validateSessionStarted();
        if (!isset($_SESSION['usuario'])) {
                redirect('?clase=usuario&metodo=login');
                exit;
        }
}

function validarEstado($estado)
{

        validarSession();
        $estadoActual = $_SESSION['usuario']->estado;
        if ($estadoActual == 'off') {
                closeSession();
                redirect('?clase=usuario&metodo=login&notficacion=usuarioDesactivado');
                echo 'no existe la session';
                exit;
        }
}

function validarRol($permitidos = [])
{
        validarSession();
        validarEstado($_SESSION['usuario']->estado);
        $rolActual = $_SESSION['usuario']->rol;
        if (!in_array($rolActual, $permitidos)) {
                redirect('?clase=producto&metodo=getProducto&notficacion=false');
                echo 'enviar a productos';
        }
        return;
}

function desactivarSession($estado)
{
        if ($estado == 'on') {
                $conexion = new Conexion();
                $conexion->query("UPDATE  usuarios SET estado = :estado WHERE id_usuarios=:id");
                $conexion->bind(':id', $_GET['id']);
                $conexion->bind(':estado', 'off');
                $conexion->execute();
        } else {
                $conexion = new Conexion();
                $conexion->query("UPDATE  usuarios SET estado = :estado WHERE id_usuarios=:id");
                $conexion->bind(':id', $_GET['id']);
                $conexion->bind(':estado', 'on');
                $conexion->execute();
        }
}

function crearSession($usuario)
{

        if (session_status() == PHP_SESSION_NONE) {
                session_start();
                $_SESSION['usuario'] = $usuario;
        }
}

function closeSession()
{
        session_start();
        session_unset();
        session_destroy();
        redirect('?clase=usuario&metodo=login');
}

// Funciones de ayuda para carrito
function validarExistenciaCarrito()
{
        isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
}

function obtenerCantidadProductos($carrito)
{
        return count($carrito);
}

function calcularTotal($carrito)
{
        $total = 0;
        foreach ($carrito as $producto) {
                $total += $producto->subTotal;
        }
        return $total;
}

// to redirect
function redirect($page)
{
        header('location: ' . ROUTE_URL . $page);
}

// Funciones de ayuda vistas
function cargarVistas($vista, $datos = [])
{
        require_once 'Views/partials-admin/header.php';
        //require_once 'Views/partials-admin/aside.php';
        require_once "Views/$vista.php";
        require_once 'Views/partials-admin/footer.php';
}

function cargarVistasPublicas($vista, $datos = [])
{
        require_once 'Views/partials-home/header.php';
        require_once "Views/$vista.php";
        require_once 'Views/partials-home/footer.php';
}

function cargarClases()
{
        $clase = 'Home'; // Clase por defecto
        $metodo = 'listar'; // metodo por defecto

        if (isset($_GET['clase']) && isset($_GET['metodo'])) {

                $clase = ucwords($_GET['clase']);
                $metodo = $_GET['metodo'];
        }

        require_once "Class/${clase}.php";
        $objeto = new $clase;

        call_user_func_array(
                array($objeto, $metodo),
                array()
        );
}

function Upload()
{       //si no existe ninguna imagen 
        $id = $_POST['id_producto'];

        //hacia que direcotio va a moverse el arcivho
        $directorio = "src/img/";
        //obtener el nombre del archivo
        $archivo = $directorio . basename($_FILES["imagen"]["name"]);
        //obtener la extension
        $tipoArchivo = Strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        //obtener el tamaño
        $revisarImagen = getimagesize($_FILES["imagen"]["tmp_name"]);

        if (!file_exists($directorio)) {
                mkdir($directorio, 0777);
        }
        if ($revisarImagen != false) {
               /* $size = $_FILES["imagen"]["size"];
                 if ($size > 15000000) {
                        redirect('?clase=producto&metodo=edit&id='.$id.'&notificacion=LaImagenDebeSerMenosA15mb'); */
                /* } elseif ($tipoArchivo == "jpg"  || $tipoArchivo == "jpeg" || $tipoArchivo == "png") { */
                        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo/*<--el directorio*/)) {
                                //echo "El archivo se subio correctamente";
                                // redirect('?clase=producto&metodo=list');

                                return $archivo;
                        } else {
                                //echo "Ocurrio un error al cargar el archivo";
                                redirect('?clase=producto&metodo=edit&id='.$id.'&notficacion=ElArchivoDebeSerFormatoImagen');
                        }
                /* } else {
                        redirect('?clase=producto&metodo=edit&id='.$id.'&notficacion=ElArchivoDebeSerFormatoImagen'); */
                /* } */
        /* } else {
                redirect('?clase=producto&metodo=edit&id='.$id.'&notficacion=ElArchivoDebeSerFormatoImagen'); */
        //}
        }
}

//Funcion para notificar
require_once 'Helpers/notificacion.php';
