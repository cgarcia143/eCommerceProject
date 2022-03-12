<?php

class Venta implements ClassModel
{
    public function __construct()
    {
        validarSession();
        require_once 'Class/Conexion.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->confPay()) {

                $conexion = new Conexion();
                $conexion->query("INSERT INTO ventas (user,fecha,valor_total,tipo_pago) VALUES (:user,:fecha,:valor_total,:tipo_pago)");
                $conexion->bind(':user', $_POST['id_usuario']);
                $conexion->bind(':fecha', $_POST['fecha']);
                $conexion->bind(':valor_total', $_POST['total']);
                $conexion->bind(':tipo_pago', 'token');

                if ( $conexion->execute()) {

                    $conexion->query("SELECT MAX(id_ventas) AS id_ventas FROM ventas");
                    $idVenta = $conexion->getRegistration()->id_ventas;
                    
                    if ($this->createDetalleVenta($idVenta, $conexion)) {
                        unset($_SESSION['carrito']);
                        if($this->createPedido($idVenta,$conexion)){
                            redirect('?clase=usuario&metodo=dashboard&notificacion=ventaTrue');   
                        } 
                    }else{
                        echo "error";
                    }
                    

                }

            }

        } else {

            $usuario = $_SESSION['usuario'];
            $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : null;
            $banks = file_get_contents('private/banks.json');

            $datos = (object)array(
                'titulo' => 'Confirmar venta',
                'carrito' => $carrito,
                'usuario' => $usuario,
                'banks' => json_decode($banks)
            );

            if ($carrito == null) {
                redirect('?clase=usuario&metodo=dashboard');  
            }else{
                cargarVistas('venta/confVenta', $datos);
            }
        }
    }

    private function createDetalleVenta(Int $idVenta, Object $conexion)
    {
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
            $count = 0;
            foreach($carrito as $producto){
                $conexion->query("INSERT INTO detalle_venta (venta,producto,cantidad,subtotal) VALUES (:venta,:producto,:cantidad,:subtotal)");
                $conexion->bind(':venta', $idVenta);
                $conexion->bind(':producto', $producto->id_producto);
                $conexion->bind(':cantidad', $producto->cantidad);
                $conexion->bind(':subtotal', $producto->subTotal);
                if ($conexion->execute()) {
                    $conexion->query("UPDATE `producto` SET `stock`= `stock` - :cantidad WHERE id_producto = :id_producto");
                    $conexion->bind(':cantidad', $producto->cantidad);
                    $conexion->bind(':id_producto', $producto->id_producto);
                    $conexion->execute();
                    $count++;
                }
            }
            return $count == count($carrito);
        }
    }

    private function createPedido(Int $idVenta, Object $conexion)
    {
        $referenciaPago = 'ref' . $this->getRefPago($conexion);

        $conexion->query("INSERT INTO pedido (venta,estado,referenciapago) VALUES (:venta,:estado,:referenciapago)");
        $conexion->bind(':venta', $idVenta);
        $conexion->bind(':estado', 'Abierto');
        $conexion->bind(':referenciapago', $referenciaPago);
        return $conexion->execute();;
    }

    private function confPay()
    {
        // $url = 'https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi';

        // $datos = [
        //     "language" => "es",
        //     "command" => "SUBMIT_TRANSACTION",
        //     "merchant" => [
        //         "apiLogin" => "pRRXKOl8ikMmt9u",
        //         "apiKey" => "4Vj8eK4rloUd272L48hsrarnUA"
        //     ],
        //     "transaction" => [
        //         "order" => [
        //             "accountId" => "512321",
        //             "referenceCode" => "cOLOSKDFSF",
        //             "description" => "Test order Colombia",
        //             "language" => "en",
        //             "notifyUrl" => "http://pruebaslap.xtrweb.com/lap/pruebconf.php",
        //             "signature" => "a2de78b35599986d28e9cd8d9048c45d",
        //             "shippingAddress" => [
        //                 "country" => "PA"
        //             ],
        //             "buyer" => [
        //                 "fullName" => "APPROVED",
        //                 "emailAddress" => "test@payulatam.com",
        //                 "dniNumber" => "1155255887",
        //                 "shippingAddress" => [
        //                     "street1" => "Calle 93 B 17 – 25",
        //                     "city" => "Cali",
        //                     "state" => "Valle",
        //                     "country" => "CO",
        //                     "postalCode" => "000000",
        //                     "phone" => "3104569874"
        //                 ]
        //             ],
        //             "additionalValues" => [
        //                 "TX_VALUE" => [
        //                     "value" => 5,
        //                     "currency" => "COP"
        //                 ]
        //             ]
        //         ],
        //         "creditCard" => [
        //             "number" => "4111111111111111",
        //             "securityCode" => "123",
        //             "expirationDate" => "2018/08",
        //             "name" => "test"
        //         ],
        //         "type" => "AUTHORIZATION_AND_CAPTURE",
        //         "paymentMethod" => "VISA",
        //         "paymentCountry" => "PA",
        //         "payer" => [
        //             "fullName" => "APPROVED",
        //             "emailAddress" => "test@payulatam.com"
        //         ],
        //         "ipAddress" => "127.0.0.1",
        //         "cookie" => "cookie_52278879710130",
        //         "userAgent" => "Firefox",
        //         "extraParameters" => [
        //             "INSTALLMENTS_NUMBER" => 1,
        //             "RESPONSE_URL" => "http://www.misitioweb.com/respuesta.php"
        //         ]
        //     ],
        //     "test" => true
        // ];

        // // Opciones de la petición HTTP
        // $opciones = array(
        //     "http" => array(
        //         "header" => "Content-type: application/json\r\n",
        //         "method" => "POST",
        //         "content" => json_encode($datos), # Agregar el contenido definido antes
        //     ),
        // );

        // $contexto = stream_context_create($opciones);

        // $resultado = file_get_contents($url, false, $contexto);

        // if ($resultado === false) { exit; }

        // print_r($resultado);

        if ($_POST['banco'] != 'select' && $_POST['tipo-documento'] != 'select' && $_POST['tipo-cliente'] != 'select') {
            return true;
        }else{
            redirect('?clase=venta&metodo=create&notificacion=complete');
            exit;
        }
    }

    private function getRefPago(Object $conexion)
    {
        $conexion->query("SELECT MAX(id_pedido) AS id_pedido FROM pedido");
        $id = $conexion->getRegistration()->id_pedido;
        $referenciaPago = $id . $this->__getDate();
        return $referenciaPago;
    }

    private function __getDate()
    {
        $hoy = getdate();
        $str = $hoy['mday'] . $hoy['mon'] . $hoy['year'] . $hoy['hours'] . $hoy['minutes'];
        return $str;
    }


    public function list()
    {
        $conexion = new Conexion();
        $conexion->query("SELECT v.id_ventas, u.nombre, v.fecha, v.valor_total, v.tipo_pago FROM ventas v INNER JOIN usuarios u ON v.user = u.id_usuarios");
        $ventas = $conexion->getLogs();

        $datos = (object)array(
            'titulo' => 'Ventas',
            'ventas' => $ventas
        );

        cargarVistas('venta/ventas', $datos);
    }

    public function verDetalleProducto()
    {
        $conexion = new Conexion();
        $conexion->query("SELECT DV.id_detalle_venta, DV.venta, P.nombre as producto, DV.cantidad, DV.subtotal  FROM `detalle_venta` DV
        INNER JOIN producto P 
        ON DV.producto = P.id_producto 
        WHERE DV.venta = :id");
        $conexion->bind(':id', $_GET['id']);
        $detallesVenta = $conexion->getLogs();

        $datos = (object)array(
            'titulo' => 'Detalle venta',
            'detallesVenta' => $detallesVenta
        );

        cargarVistas('venta/detalleVenta', $datos);
    }

    public function edit()
    {
    }

    public function delete()
    {
    }
}
