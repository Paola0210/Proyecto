<article class="content">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <form method="post" id="data_form" class="form-horizontal">
            <div class="grid_3 grid_4">

                <h5>Edicion de almacen</h5>
                <hr>


                <input type="hidden" name="catid" value="<?php echo $almacenes['id'] ?>">


                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="product_cat_name">Nombre Almacen</label>

                    <div class="col-sm-8">
                        <input type="text"
                               class="form-control margin-bottom  required" name="almacen"
                               value="<?php echo $almacenes['almacen'] ?>">
                    </div>
                </div>


                <div class="form-group row">

                    <label class="col-sm-2 col-form-label">Descripcion</label>

                    <div class="col-sm-8">


                        <input type="text" name="descripcion" class="form-control required"
                               aria-describedby="sizing-addon1" value="<?php echo $almacenes['descripcion'] ?>">

                    </div>

                </div>


                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="Actualizar" data-loading-text="Updating...">
                        <input type="hidden" value="productcategory/editalmacenes" id="action-url">
                    </div>
                </div>

            </div>
        </form>
    </div>

</article>

