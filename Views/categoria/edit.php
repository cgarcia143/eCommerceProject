<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Actualizar Categoria Productos
            </h2>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form action="http://localhost/sigeprop/?clase=Categoria&metodo=edit" method="POST">
                    <input type="hidden" name="id_categoria" value="<?php echo $datos->categoriaupdate->id_categoria; ?>" required>
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="<?php echo $datos->categoriaupdate->nombre; ?>" required>
                    <br>
                    <label for="categoria">Descripcion</label>
                    <input class="form-control" type="text" name="descripcion" value="<?php echo $datos->categoriaupdate->descripcion; ?>" required>
                    <br>
                    <!--<input type="submit" value="actualizar">-->
                    <div class="container" style="text-align: right;width: 100%;">
                        <input type="hidden" value="Actualizar categoria" name="actualizar">
                        <input class="btn btn-primary btn-sm" type="submit" value="actualizar">
                    </div>
                </form>
            </div>
        </div>