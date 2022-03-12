<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>editar Producto</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo ROUTE_URL; ?>?clase=Producto&metodo=edit" method="POST" enctype="multipart/form-data">
                            <label for="codigo">Codigo</label>
                            <input class="form-control" type="number" name="codigo" value="<?php echo $datos->datosUpdate->codigo; ?>">
                            <input type="hidden" name="id_producto" value="<?php echo $datos->datosUpdate->id_producto; ?>">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" value="<?php echo $datos->datosUpdate->nombre; ?>">
                            <label for="categoria">Categoria</label>
                            <select class="form-control" name="categoria" id="rol">
                                <option value="">select</option>
                                <?php foreach ($datos->categorias as $categoria) : ?>
                                    <?php if ($datos->datosUpdate->categoria == $categoria->id_categoria) : ?>
                                        <option value="<?php echo $categoria->id_categoria; ?>" selected><?php echo $categoria->nombre; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <label for="precio">Precio</label>
                            <input class="form-control" type="number" name="precio" value="<?php echo $datos->datosUpdate->precio; ?>">
                            <label for="descripcion">Descripcion</label>
                            <input class="form-control" type="textarea" name="descripcion" value="<?php echo $datos->datosUpdate->descripcion; ?>">
                            <label for="proveedor">Proveedor</label>
                            <select class="form-control" name="proveedor" id="rol">
                                <option value="">select</option>
                                <?php foreach ($datos->proveedores as $proveedor) : ?>
                                    <?php if ($datos->datosUpdate->proveedor == $proveedor->id_pro) : ?>
                                        <option value="<?php echo $proveedor->id_pro; ?>" selected><?php echo $proveedor->nombre; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $proveedor->id_pro; ?>"><?php echo $proveedor->nombre; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <label for="stock">Cantidad</label>
                            <input class="form-control" type="number" name="stock" value="<?php echo $datos->datosUpdate->stock; ?>">
                            <label for="estado">Estado</label>
                            <select class="form-control"  name="estado" id="#">
                                <option value="">select</option>
                                <option value="1" <?php echo ($datos->datosUpdate->estado == "on") ? "selected" : ""; ?>>On
                                </option>
                                <option value="2" <?php echo ($datos->datosUpdate->estado == "off") ? "selected" : ""; ?>>off
                                </option>
                            </select>
                            <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input accept="image/*" onchange="upload()" class="form-control-file" type="file" style="margin-top: 5px;" name="imagen" id="imagen" value="<?php echo $datos->datosUpdate->imagen; ?>">
                            <input type="hidden" name="urlImg" value="<?php echo $datos->datosUpdate->imagen; ?>">
                            </div>
                            <div class="container" style="text-align: right;width: 100%;">
                                <input type="hidden" value="Actualizar producto" name="actualizar">
                                <input class="btn btn-primary btn" type="submit" value="actualizar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





