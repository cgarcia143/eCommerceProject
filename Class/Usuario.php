<?php

class Usuario implements ClassModel
{

    public function __construct()
    {
        require_once 'Class/Conexion.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conexion = new Conexion();
            $conexion->query("SELECT * FROM usuarios WHERE correo = :correo AND password = :password");
            $conexion->bind(':correo', $_POST['correo']);
            $conexion->bind(':password', md5($_POST['password']));
            $usuario = $conexion->getRegistration();

            if ($usuario != null) {
                crearSession($usuario);
                redirect('?clase=usuario&metodo=dashboard');
            } else {
                redirect('?clase=usuario&metodo=login&notificacion=usuarioNologueado');
            }
        } else {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                if (!isset($_SESSION['usuario'])) {
                    require_once "Views/auth/login.php";
                } else {
                    redirect('?clase=usuario&metodo=dashboard');
                }
            }
        }
    }

    public function dashboard()
    {
        validarRol([1, 2, 3]);
        $usuario = $_SESSION['usuario'];
        $conexion = new Conexion();
        $resultado = null;
        $query = "SELECT * FROM producto ORDER BY stock DESC LIMIT 2";
        $conexion->query($query);
        $productos = $conexion->getLogs();

        switch ($usuario->rol) {
            case 1 || 3:
                $query = "SELECT * FROM `pedido` WHERE estado = 'en proceso' OR estado = 'Abierto'";
                $conexion->query($query);
                $resultado = $conexion->getLogs();
                break;
            case 2:
                $query = "SELECT * FROM pedido P 
                INNER JOIN ventas V
                ON P.venta = V.id_ventas
                WHERE V.user = :id";
                $conexion->query($query);
                $conexion->bind(':id', $usuario->id_usuarios);
                $resultado = $conexion->getLogs();
                break;
            case 3:
                # code...
                break;
            case 4:
                # code...
                break;

            default:
                # code...
                break;
        }


        $datos = (object)array(
            'titulo' => 'Dashboard',
            'pedidos' => $resultado,
            'productos' => $productos
        );

        cargarVistas('usuarios/dashboard', $datos);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $conexion = new Conexion();

            $estado = 1;

            $rol = 2;

            $ciudad = $_POST['ciudad'];
            $ciudad = intval($ciudad);

            $password = $_POST['password'];
            $password = md5($password);

            $fecha_nmto = $_POST['fecha_nmto'];
            $fecha_nmto = date("Y-m-d H:i:s", strtotime($fecha_nmto));

            $conexion->query("SELECT * FROM usuarios WHERE correo = :correo ");
            $conexion->bind(':correo', $_POST['correo']);
            $conexion->execute();

            if ($conexion->getRowCount() > 0) {
                redirect('?clase=usuario&metodo=login&notficacion=true');
                exit;
            } else {
                $conexion->query("INSERT INTO usuarios (cedula,nombre,apellido,tipo_doc,estado,rol,ciudad,fecha_nmto,telefono,correo,genero,password,direccion) VALUES (:cedula,:nombre,:apellido,:tipo_doc,:estado,:rol,:ciudad,:fecha_nmto,:telefono,:correo,:genero,:password,:direccion)");
                $conexion->bind(':cedula', $_POST['cedula']);
                $conexion->bind(':nombre', $_POST['nombre']);
                $conexion->bind(':apellido', $_POST['apellido']);
                $conexion->bind(':tipo_doc', $_POST['tipo_doc']);
                $conexion->bind(':estado', $estado);
                $conexion->bind(':rol', $rol);
                $conexion->bind(':ciudad', $ciudad);
                $conexion->bind(':fecha_nmto', $fecha_nmto);
                $conexion->bind(':telefono', $_POST['telefono']);
                $conexion->bind(':correo', $_POST['correo']);
                $conexion->bind(':genero', $_POST['genero']);
                $conexion->bind(':password', $password);
                $conexion->bind(':direccion', $_POST['direccion']);

                $resultado = $conexion->execute();

                if ($resultado) {
                    redirect('?clase=usuario&metodo=login&notificacion=usuarioCreado');
                }
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                if (!isset($_SESSION['usuario'])) {
                    require_once "Views/auth/registrar.php";
                } else {
                    redirect('?clase=usuario&metodo=dashboard');
                }
            }
        }
    }

    public function list()
    {
        validarRol([1, 3]);
        $conexion = new Conexion();
        $query = "SELECT u.id_usuarios, u.cedula cedula, u.nombre nombre, u.apellido apellido, u.estado estado, u.telefono telefono, u.direccion, u.correo correo, r.descripcion rol  FROM usuarios u INNER JOIN roles r ON u.rol=r.id_roles";

        $conexion->query($query);
        $usuarios = $conexion->getLogs();

        $datos = (object)array(
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios
        );
        cargarVistas("usuarios/userlist", $datos);
    }

    public function edit()
    {
        validarRol([1]);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rol = $_POST['rol'];
            $rol = intval($rol);

            $ciudad = $_POST['ciudad'];
            $ciudad = intval($ciudad);

            $password = $_POST['password'];
            $password = md5($password);

            $fecha_nmto = $_POST['fecha_nmto'];

            $conexion = new Conexion();
            $conexion->query("UPDATE  usuarios SET cedula = :cedula, nombre = :nombre, apellido = :apellido, tipo_doc = :tipo_doc, estado = :estado, ciudad = :ciudad , fecha_nmto = :fecha_nmto, telefono = :telefono, correo = :correo , genero = :genero, direccion = :direccion, rol = :rol WHERE id_usuarios=:id");
            $conexion->bind(':id', $_POST['id_usuarios']);
            $conexion->bind(':cedula', $_POST['cedula']);
            $conexion->bind(':rol', $_POST['rol']);
            $conexion->bind(':nombre', $_POST['nombre']);
            $conexion->bind(':apellido', $_POST['apellido']);
            $conexion->bind(':tipo_doc', $_POST['tipo_doc']);
            $conexion->bind(':estado', $_POST['estado']);
            $conexion->bind(':ciudad', $ciudad);
            $conexion->bind(':fecha_nmto', $fecha_nmto);
            $conexion->bind(':telefono', $_POST['telefono']);
            $conexion->bind(':correo', $_POST['correo']);
            $conexion->bind(':genero', $_POST['genero']);
            $conexion->bind(':direccion', $_POST['direccion']);

            $resultado = $conexion->execute();

            if ($resultado) {
                redirect('?clase=usuario&metodo=list&notificacion=usuarioEditado');
            }
        } else {
            $conexion = new Conexion();
            $conexion->query("SELECT * FROM usuarios WHERE id_usuarios = :id");
            $conexion->bind(':id', $_GET['id']);
            $resultado = $conexion->getRegistration();
            $datos = (object)array(
                'titulo' => 'Usuarios',
                'datosUpdate' => $resultado
            );
            cargarVistas('usuarios/edit', $datos);
        }
    }

    public function delete()
    {
        $conexion = new Conexion();
        $conexion->query("DELETE FROM usuarios WHERE id_usuarios = :id");
        $conexion->bind(':id', $_GET['id']);
        $resultado = $conexion->execute();
        redirect('?clase=usuario&metodo=list&notificacion=usuarioEliminado');
    }

    public function create()
    {
        validarRol([1]);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $conexion = new Conexion();
            $rol = $_POST['rol'];
            $rol = intval($rol);

            $ciudad = $_POST['ciudad'];
            $ciudad = intval($ciudad);

            $password = $_POST['password'];
            $password = md5($password);

            $fecha_nmto = $_POST['fecha_nmto'];
            $fecha_nmto = date("Y-m-d H:i:s", strtotime($fecha_nmto));

            $conexion->query("SELECT * FROM usuarios WHERE correo = :correo ");
            $conexion->bind(':correo', $_POST['correo']);
            $conexion->execute();

            if ($conexion->getRowCount() > 0) {
                redirect('?clase=usuario&metodo=login&notficacion=true');
                exit;
            } else {
                $conexion->query("INSERT INTO usuarios (cedula,nombre,apellido,tipo_doc,estado,rol,ciudad,fecha_nmto,telefono,correo,genero,password,direccion) VALUES (:cedula,:nombre,:apellido,:tipo_doc,:estado,:rol,:ciudad,:fecha_nmto,:telefono,:correo,:genero,:password,:direccion)");
                $conexion->bind(':cedula', $_POST['cedula']);
                $conexion->bind(':nombre', $_POST['nombre']);
                $conexion->bind(':apellido', $_POST['apellido']);
                $conexion->bind(':tipo_doc', $_POST['tipo_doc']);
                $conexion->bind(':estado', $_POST['estado']);
                $conexion->bind(':rol', $rol);
                $conexion->bind(':ciudad', $ciudad);
                $conexion->bind(':fecha_nmto', $fecha_nmto);
                $conexion->bind(':telefono', $_POST['telefono']);
                $conexion->bind(':correo', $_POST['correo']);
                $conexion->bind(':genero', $_POST['genero']);
                $conexion->bind(':password', $password);
                $conexion->bind(':direccion', $_POST['direccion']);

                $resultado = $conexion->execute();

                if ($resultado) {
                    redirect('?clase=usuario&metodo=list&notificacion=usuarioCreado');
                }
            }
        } else {
            cargarVistas('usuarios/create', $datos = []);
        }
    }

    public function desactivar()
    {
        validarRol([1, 2, 3]);
        $idUser = $_SESSION['usuario']->id_usuarios;
        $idRol = $_SESSION['usuario']->rol;

        $idGet = $_GET['id'];
        $estado = $_GET['estado'];

        if ($idUser != $idGet && $idRol == 1) {
            desactivarSession($estado);
            redirect('?clase=usuario&metodo=list&notificacion=usuarioDesactivado');
            exit;
        } elseif ($idUser == $idGet) {
            validarRol([1, 2, 3]);
            desactivarSession($estado);
            closeSession();
        } else {
            redirect('?clase=usuario&metodo=list&notificacion=rolNoPermitido');
        }
    }

    public function logout()
    {
        closeSession();
    }

    public function settings()
    {
        validarRol([1, 2, 3]);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ciudad = $_POST['ciudad'];
            $ciudad = intval($ciudad);

            $password = $_POST['password'];
            $password = md5($password);

            $conexion = new Conexion();
            $conexion->query("UPDATE  usuarios SET cedula = :cedula, nombre = :nombre, apellido = :apellido, tipo_doc = :tipo_doc, ciudad = :ciudad, telefono = :telefono, correo = :correo , genero = :genero, password = :password, direccion = :direccion WHERE id_usuarios=:id");
            $conexion->bind(':id', $_SESSION['usuario']->id_usuarios);
            $conexion->bind(':cedula', $_POST['cedula']);
            $conexion->bind(':nombre', $_POST['nombre']);
            $conexion->bind(':apellido', $_POST['apellido']);
            $conexion->bind(':tipo_doc', $_POST['tipo_doc']);
            $conexion->bind(':ciudad', $ciudad);
            $conexion->bind(':telefono', $_POST['telefono']);
            $conexion->bind(':correo', $_POST['correo']);
            $conexion->bind(':genero', $_POST['genero']);
            $conexion->bind(':password', $password);
            $conexion->bind(':direccion', $_POST['direccion']);

            $resultado = $conexion->execute();

            if ($resultado) {

                redirect('?clase=usuario&metodo=dashboard&notificacion=usuarioEditado');
            }
        } else {
            validarRol([1, 2, 3]);
            $conexion = new Conexion();
            $conexion->query("SELECT * FROM usuarios WHERE id_usuarios = :id");
            $conexion->bind(':id', $_SESSION['usuario']->id_usuarios);
            $resultado = $conexion->getRegistration();
            $datos = (object)array(
                'titulo' => 'Usuarios',
                'datosUpdate' => $resultado
            );
            cargarVistas('usuarios/profile', $datos);
        }
    }

    public function download (){
        validarRol([1]);
        cargarVistas('partials-admin/downloadJava', $datos=[]);
    }
}
