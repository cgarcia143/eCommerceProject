<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title text-center" id="#">
                Eliminar Categoria Producto
            </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form action="<?php echo ROUTE_URL; ?>?clase=Categoria&metodo=delete" method="POST">
                    <input type="hidden" name="id_categoria" value="<?php echo $datos->categoria_eliminar->id_categoria; ?>">
                    <div class="modal-body">
                        <p class="text-center">¿Esta seguro de eliminar la categoria?</p>
                        <h2 class="text-center"><?php echo $datos->categoria_eliminar->nombre; ?></h2>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="eliminar" name="eliminar">
                        <input type="submit" value="eliminar" class="btn btn-danger btn-sm">
                        <span class="fa fa-trash"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>