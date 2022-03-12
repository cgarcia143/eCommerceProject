  <!-- New Arrivals -->
  <section class="section">
    
    <div class="product-center container">

      <div class="product-detail">
        <div class="img-cover">
          <img src="<?php echo $datos->producto->imagen; ?>" alt="<?php echo $datos->producto->pronombre; ?>" />
        </div>
        <div class="detail">
          <h3><?php echo $datos->producto->pronombre; ?></h3>
          <div class="description">
            <p><?php echo $datos->producto->descripcion; ?></p>
          </div>
          <div class="price">$ <span><?php echo $datos->producto->precio; ?></span></div>
          <div>
            <div class="counter">
              <span class="down" onClick='decreaseCount(event, this)'>-</span>
              <input type="text" id="cantidad" value="1">
              <span class="up" onClick='increaseCount(event, this)'>+</span>
            </div>
            <br>
            <a href="<?php echo ROUTE_URL . '?clase=carrito&metodo=add&id=' . $datos->producto->id_producto; ?>" id="comprar" class="btn btn-primary">compar</a>
          </div>
        </div>
      </div>
      
    </div>
  </section>

  <script type="text/javascript">

    let value = 0;
    const btnComprar = document.querySelector('#comprar');
    const inputCantidad = document.querySelector('#cantidad');

    function increaseCount(a, b) {
      var input = b.previousElementSibling;
      var value = parseInt(input.value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      input.value = value;
    }

    function decreaseCount(a, b) {
      var input = b.nextElementSibling;
      var value = parseInt(input.value, 10);
      if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
      }
    }

    btnComprar.addEventListener('click', function(e){
      e.preventDefault();
      const cantidad = inputCantidad.value;
      const href = `${btnComprar.href}&cantidad=${cantidad}`;
      window.location = href;
    });

  </script>