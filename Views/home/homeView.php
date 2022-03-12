<section class="section services">
  <div class="service-center container">
    <div class="slider">
      <div><img src="<?php echo ROUTE_URL; ?>/src/slider/Banner_1.png"></div>
      <div><img src="<?php echo ROUTE_URL; ?>/src/slider/Banner_2.png"></div>
      <div><img src="<?php echo ROUTE_URL; ?>/src/slider/Banner_3.png"></div>
    </div>
  </div>
  <div class="service-center container">
    <div class="service">
      <span class="icon"><i class="bx bx-purchase-tag"></i></span>
      <h4>Envio Gratis</h4>
      <span class="text">limitado a $50.000 por pedido</span>
    </div>

    <div class="service">
      <span class="icon"><i class="bx bx-gift"></i></span>
      <h4>Pagos de Seguridad</h4>
      <span class="text">Cuotas de hasta 12 mese</span>
    </div>

    <div class="service">
      <span class="icon"><i class="bx bx-book-reader"></i></span>
      <h4>Devoluciones en 14 dias</h4>
      <span class="text">Compra con confianza</span>
    </div>

    <div class="service">
      <span class="icon"><i class="bx bx-headphone"></i></span>
      <h4>Soporte 24/7 </h4>
      <span class="text">Entregado en tu puerta</span>
    </div>
  </div>
</section>

<!-- New Arrivals -->
<section class="section">
  <div class="title">
    <h1><span>Nuestros</span> Productos</h1>
  </div>
  <div class="product-center container">

    <?php foreach ($datos->productos as $producto) : ?>
      <div class="product">
        <div class="img-cover">
          <a href="<?php echo ROUTE_URL . '?clase=home&metodo=detailProduct&id=' . $producto->id_producto; ?>">
            <img src="<?php echo $producto->imagen; ?>" alt="<?php echo $producto->pronombre; ?>" />
          </a>
        </div>
        <div>
          <a href="<?php echo ROUTE_URL . '?clase=home&metodo=detailProduct&id=' . $producto->id_producto; ?>">
            <?php echo $producto->pronombre; ?>
          </a>
        </div>
        <div class="price">$ <span><?php echo $producto->precio; ?></span></div>
        <div>
          <a href="<?php echo ROUTE_URL . '?clase=carrito&metodo=add&id=' . $producto->id_producto; ?>" class="btn btn-primary">
            comprar
          </a>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</section>

<script>
  $(document).ready(function() {
    $('.slider').bxSlider({
      mode: 'fade',
      auto: true,
      captions: true,
      slideWidth: 1150
    });
  });
</script>
<?php mostrarNotificacion(); ?>