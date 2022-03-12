<?php

function mostrarNotificacion()
{
    $tipo = '';
    $mensaje = '';

    if (isset($_GET['notificacion'])) {

        switch ($_GET['notificacion']) {

            case 'agregado':
                $tipo = 'success';
                $mensaje = 'El producto fue añadido';
                break;
            
            case 'eliminado':
                $tipo = 'success';
                $mensaje = 'El producto fue eliminado';
                break;

            case 'errorStock':
                $tipo = 'error';
                $mensaje = 'La cantidad superó el stock, se añadió el maximo disponible';
                break;

            case 'false':
                $tipo = 'error';
                $mensaje = 'No tienes acceso';
                break;

            case 'complete':
                $tipo = 'error';
                $mensaje = 'Seleccione banco, tipo cliente y tipo persona.';
                break;

            case 'ventaTrue':
                $tipo = 'success';
                $mensaje = 'Pago realizado con exito';
                break;

            case 'updatePedido':
                $tipo = 'success';
                $mensaje = 'Pedido modificado';
                break;
            
            case 'updatePrducto':
                $tipo = 'success';
                $mensaje = 'Producto modificado';
                break;

            case 'usuarioCreado':
                $tipo = 'success';
                $mensaje = 'El usuario fue creado!';
                break;

            case 'usuarioNologueado':
                $tipo = 'error';
                $mensaje = 'El nombre/contraseña no son correctos';
                break;

            case 'usuarioEditado':
                $tipo = 'success';
                $mensaje = 'El usuario ha sido editado';
                break;

            case 'usuarioEliminado':
                $tipo = 'success';
                $mensaje = 'El usuario ha sido eliminado';
                break;

            case 'usuarioDesactivado':
                $tipo = 'success';
                $mensaje = 'Este proceso se ha realizado correctamente!';
                break;

            case 'rolNoPermitido':
                $tipo = 'error';
                $mensaje = 'este rol no puede hacer esto!';
                break;
                
            case 'createCategoria':
                $tipo = 'success';
                $mensaje = 'La categoria producto ha sido creada satisfactoriamente';
                break;

            case 'yaExisteEstaCategoria':
                $tipo = 'error';
                $mensaje = 'La categoria ya existe, por favor coloque una categoria nueva';
                break;
            
            case 'upDateCategoria':
                $tipo = 'success';
                $mensaje = 'La categoria producto ha sido actualizada satisfactoriamente';
                break;
            
            case 'deleteCategoria':
                $tipo = 'success';
                $mensaje = 'La categoria producto ha sido eliminada de los registros';
                break;

            case 'usuarioDesactivado':
                $tipo = 'error';
                $mensaje = 'este Usuario esta desactivado!';
                break;


            default:
                # code...
                break;
        }
    }

    if ($mensaje !== '') {
        echo "<script>
                Swal.fire(
                        '$tipo!',
                        '$mensaje!',
                        '$tipo'
                )
             </script>";
    }
}
