<?php 

class Pedido
{
    public function __construct()
    {
        validarSession();
        require_once 'Class/Conexion.php';
    }

    public function list()
    {
        $conexion = new Conexion();
        $query = "SELECT * FROM `pedido`";
        $conexion->query($query);
        $pedidos = $conexion->getLogs();
        $datos = (object)array(
            'titulo' => 'Productos',
            'pedidos' => $pedidos
        );
        cargarVistas("pedido/pedidos", $datos);
    }

    public function actualizarEstado()
    {
        if (isset($_POST['id_pedido']) && isset($_POST['estado'])) {
            $conexion = new Conexion();
            $conexion->query("UPDATE pedido SET estado=:estado WHERE id_pedido = :id");
            $conexion->bind(':estado', $_POST['estado']);
            $conexion->bind(':id', $_POST['id_pedido']);
            $resul = $conexion->execute();

            if ($resul) {
                redirect('?clase=usuario&metodo=dashboard&notificacion=updatePedido');
            }
        }
    }

    public function verPedido()
    {
        $conexion = new Conexion();
        $conexion->query("SELECT * FROM pedido WHERE id_pedido = :id");
        $conexion->bind(':id', $_GET['id_pedido']);
        $pedidos = $conexion->getRegistration();

        $id_venta = $pedidos->venta;

        $conexion->query("SELECT * FROM ventas WHERE id_ventas = :id");
        $conexion->bind(':id', $id_venta);
        $venta = $conexion->getRegistration();

        $conexion->query("SELECT DV.id_detalle_venta, DV.venta, P.nombre as producto, P.precio, DV.cantidad, DV.subtotal FROM detalle_venta DV INNER JOIN producto P ON DV.producto = P.id_producto  WHERE venta = :id");
        $conexion->bind(':id', $id_venta);
        $detallesVentas = $conexion->getLogs();

        $datos = (object)array(
            'titulo' => 'Gestionar pedido',
            'pedido' => $pedidos,
            'venta' => $venta,
            'detallesVentas' => $detallesVentas
        );

        cargarVistas('pedido/pedidoDetalle', $datos);

    }
}