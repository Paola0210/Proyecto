<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<article class="content">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <form method="post" id="data_form" class="form-horizontal">
            <div class="grid_3 grid_4">

                <h5>Nueva Propiedad de Apartamento</h5>
                <hr>
               
				<div class="form-group row">

                    <label class="col-sm-2 col-form-label"
                           for="nombre">Nombre</label>

                    <div class="col-sm-6">
                    	<input type="text" placeholder="Nombre de la propiedad"
                               class="form-control margin-bottom  required" name="nombre">
                    </div>
                </div>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"
                           for="nombre">Tipo</label>

                    <div class="col-sm-6">
                    <select id="tipo" name="tipo" class="form-control required"  required >
                            <option value="numeric">Numeric</option>  
                            <option value="yes_or_no">Yes/not</option>  
                            <option value="List">List</option>  
                    </select>
                    </div>
                </div>
			     <div class="form-group row">

                    <label class="col-sm-2 col-form-label"
                           for="maximo">Cantidad Maxima</label>

                    <div class="col-sm-6">
                        <input type="number" placeholder="Maximo"
                               class="form-control margin-bottom " name="maximo">
                    </div>
                </div>
                <div class="form-group row">
                     <label class="col-sm-2 col-form-label"
                           for="nombre">Lista de la propiedad</label>
                            <div class="col-sm-6">
                    <div class="form-group">
                          <select id="lista_multiple" name="lista_multiple[]" class="form-control select-box" multiple="multiple">
                               
                            </select>

                    </div>
                </div>
                </div>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="Crear" data-loading-text="Updating...">
                        <input type="hidden" value="propertiesapto/new_properti" id="action-url">
                    </div>
                </div>

            </div>
        </form>
        <div class="box"></div>


    </div>

</article>
<script type="text/javascript">
    $("#lista_multiple").select2({ tags: true});
    $(document).on("change","#tipo",function (argument) {
        console.log()//aqui voy
    });
</script>