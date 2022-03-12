  <!-- New Arrivals -->
  <section class="section">

      <div class="product-center container">

          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Subtotal</th>
                      <th scope="col">Opción</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($datos->carrito as $producto) : ?>
                      <tr>
                          <th scope="row"><?php echo $producto->id_producto; ?></th>
                          <td><?php echo $producto->nombre; ?></td>
                          <td><?php echo $producto->precio; ?></td>
                          <td><?php echo $producto->cantidad; ?></td>
                          <td><?php echo $producto->subTotal; ?></td>
                          <td><a href="?clase=carrito&metodo=delete&id=<?php echo $producto->id_producto; ?>" class="btn btn-primary">eliminar</a></td>
                      </tr>
                  <?php endforeach; ?>
                  <tr>
                      <td colspan="6">
                          <h3>Total: $ <?php echo $datos->total; ?></h3>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
      <div class="container">
          <a href="productoApp.php?metodo=listarProductos" class="btn btn-warning">
              Seguir comprando
          </a>
          <a href="?clase=venta&metodo=create" class="btn btn-danger">
              Confirmar compra
          </a>
      </div>
  </section>