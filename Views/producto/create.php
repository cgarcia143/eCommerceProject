<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Crear Producto</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo ROUTE_URL; ?>?clase=producto&metodo=create" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                            <label for="codigo">Codigo*</label>
                            <input class="form-control" type="number" name="codigo">
                                <label for="nombre">Nombre*</label>
                                <input class="form-control" type="text" name="nombre">
                            </div>
                            <label for="categoria">Categoria*</label>
                            <select class="form-control" name="categoria">
                                <option value="">select</option>
                                <?php foreach ($datos->categorias as $cat) : ?>
                                <option value="<?php echo $cat->id_categoria; ?>"><?php echo $cat->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="precio">Precio*</label>
                            <input class="form-control" type="number" name="precio">
                            <label for="descripcion">Descripcion</label>
                            <input class="form-control" type="textarea" name="descripcion">

                            <label for="provedor">Proveedor*</label>
                            <select class="form-control" name="proveedor" id="#">
                                <option value="">select</option>
                                <?php foreach ($datos->proveedores as  $proveedor) : ?>
                                    <option value="<?php echo $proveedor->id_pro; ?>"><?php echo $proveedor->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="stock">Cantidad*</label>
                            <input class="form-control" type="number" name="stock">
                            <label for="estado">Estado*</label>
                            <select name="estado" id="#">
                            <option value="">select</option>
                                <option value="on">On</option>
                                <option value="off">Off</option>
                            </select></p>
                            <div class="form-group">
                            <label for="imagen">Imagen</label></p>
                            <input class="form-control-file" accept="jpg,png,jpeg" required onchange="upload()" type="file" name="imagen" id="imagen">
                            </div>

                            <div style="margin-top: 10px; text-align: right;"><input class="btn btn-primary" type="submit" value="Registrar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//var_dump($datos);
?>