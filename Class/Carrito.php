<?php

class Carrito
{
    private $conexion = null;

    public function __construct()
    {
        validateSessionStarted();
        require_once 'Class/Conexion.php';
        $this->conexion = new Conexion();
    }

    public function add()
    {
        if (!isset($_GET['id'])) { redirect('?clase=home&metodo=listar'); exit; }
        $carrito = $this->getCarrito();
        $id = $_GET['id'];
        $cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : 1 ;
        
        // Validar si el producto existe en el carrito
        if (array_key_exists($id, $carrito)) {
            // Accedemos al producto y cambiamos valores correspondientes
            $carrito[$id]->cantidad += $cantidad;
            $carrito[$id]->subTotal += ($carrito[$id]->precio*$cantidad);
        }else{
            // Preparamos el nuevo producto
            $this->conexion->query("SELECT * FROM producto WHERE id_producto = :id");
            $this->conexion->bind(':id', $id);
            $producto = $this->conexion->getRegistration();
            $producto->cantidad = $cantidad;
            $producto->subTotal = $producto->precio*$cantidad;
            $carrito[$id] = $producto;
        }
        $status = $this->validarStock($id, $carrito);
        $this->setCarrito($carrito);
        redirect('?clase=home&metodo=listar&notificacion='.$status.'');
    }

    private function getCarrito()
    {
        return isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [] ;
    }

    private function setCarrito(Array $carrito)
    {
        $_SESSION['carrito'] = $carrito;
    }

    private function validarStock(Int $id, Array $carrito)
    {
        $stock = $carrito[$id]->stock;
        $cantidad = $carrito[$id]->cantidad;
        if ($cantidad > $stock) {
            $diferencia = $cantidad - $stock;
            $carrito[$id]->cantidad -= $diferencia;
            $descuento = $carrito[$id]->precio*$diferencia;
            $carrito[$id]->subTotal -= $descuento;
            return 'errorStock';
        }
    }

    public function list()
    {
        $carrito = $this->getCarrito();
        $datos = (object)array(
            'titulo' => 'Productos en carrito',
            'carrito' => $carrito,
            'total' => calcularTotal($carrito)
        );
        cargarVistasPublicas('public/carrito', $datos);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id = $_GET['id'];

            // 1. Existe carrito ?
            $carrito = $this->getCarrito();
            // 2. Modificar valores.
            $carrito[$id]->cantidad -= 1;
            $carrito[$id]->subTotal -= $carrito[$id]->precio;
            // 4. Validar cantidad que queda.
            if ($carrito[$id]->cantidad == 0) {
                unset($carrito[$id]);
            }

            $this->setCarrito($carrito);
            redirect('?clase=carrito&metodo=list');
        }
    }
}
