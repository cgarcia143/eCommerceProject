<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>
                            Crear Categoria Productos
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo ROUTE_URL; ?>?clase=Categoria&metodo=create" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" required>
                            </div>
                            <label for="descripcion">Descripcion</label>
                            <input class="form-control" type="text" name="descripcion" required>
                            <br>
                            <div style="margin-top: 10px; text-align: right;"><input class="btn btn-primary" type="submit" value="Crear Categoria">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 mostrarNotificacion();