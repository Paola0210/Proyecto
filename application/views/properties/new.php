<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<article class="content">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <form method="post" id="data_form" class="form-horizontal" action="new_properti">
            <div class="grid_3 grid_4">

                <h5>Nueva Propiedad de Apartamento</h5>
                <hr>
               
				<div class="form-group row">

                    <label class="col-sm-2 col-form-label"
                           for="nombre">Nombre</label>

                    <div class="col-sm-6">
                    	<input type="text" placeholder="Nombre de la propiedad" required 
                               class="form-control margin-bottom  required" name="nombre">
                    </div>
                </div>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"
                           for="tipo">Tipo</label>

                    <div class="col-sm-6">
                    <select id="tipo" name="tipo" class="form-control required"   >
                            <option value="numeric">Numeric</option>  
                            <option value="yes_or_no">Yes/not</option>  
                            <option value="List">List</option>  
                    </select>
                    </div>
                </div>
			     <div class="form-group row divs_tipos" id="div_cantidad_maxima">

                    <label class="col-sm-2 col-form-label"
                           for="maximo">Cantidad Maxima</label>

                    <div class="col-sm-6">
                        <input id="inp_maximo" type="number"  placeholder="Maximo"
                               class="form-control margin-bottom " name="maximo">
                    </div>
                </div>
                <div class="form-group row divs_tipos" id="div_lista">
                     <label class="col-sm-2 col-form-label"
                           for="nombre">Lista de la propiedad</label>
                            <div class="col-sm-6">
                    <div class="form-group">
                          <select title ="Agrega elementos a la lista" id="lista_multiple" name="lista_multiple[]" class="form-control select-box" multiple="multiple">
                               
                            </select>

                    </div>
                </div>
                </div>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="submit-datax" class="btn btn-success margin-bottom"
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
    validar_tipo();
    $(document).on("change","#tipo",function (argument) {
        validar_tipo();
    });
    
var input = document.getElementById('lista_multiple');
input.oninvalid = function(event) { event.target.setCustomValidity('Add items to the list'); }
    function validar_tipo(){
        var x1=$("#tipo option:selected").val();
        if(x1=="numeric"){
            $("#lista_multiple").removeAttr("required");
            $("#div_lista").hide();
            $("#inp_maximo").attr("required","required");
            $("#div_cantidad_maxima").show();
        }else if(x1=="yes_or_no"){
            $("#inp_maximo").removeAttr("required");
            $("#lista_multiple").removeAttr("required");
            $(".divs_tipos").hide();
        }else{
            
            $("#div_cantidad_maxima").hide();
            $("#inp_maximo").removeAttr("required");
            $("#lista_multiple").attr("required","required");
            $("#div_lista").show();
        }
    }

</script>