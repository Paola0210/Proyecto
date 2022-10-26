<style>
.st-Activo, .st-Instalar , .st-Cortado, .st-Suspendido, .st-Exonerado, .st-Compromiso
{
	text-transform: uppercase;
    color: #fff;
    padding: 4px;
    border-radius: 11px;
    font-size: 15px;
}
.st-Activo
{
 background-color: #4EAA28;
}
.st-Instalar
{
 background-color: #A49F20;
}
.st-Cortado
{
 background-color: #A4282A;
}
.sts-Cortado
{
 color: #A4282A;
}
.st-Suspendido
{
 background-color: #2224A3;
}
.sts-Suspendido
{
 color: #2224A3;
}
.st-Exonerado
{
 background-color: #24A9AB;
}
.st-Compromiso
{
 background-color: #8B6390;
}
.cl-servicios:hover {
    border: solid 1px red;
}
.cl-ck-f-electronicas:hover{
     transform: scale(4);
}


/*Cambios filtro multiple */
.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}
/*primer grupo de chechbox configuracion (estado usuario)*/
#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
/*segundo grupo de chechbox configuracion (estado de cuenta)*/
#checkboxes2 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes2 label {
  display: block;
}

#checkboxes2 label:hover {
  background-color: #1e90ff;
}
/*3er grupo de chechbox configuracion (localidad)*/
#checkboxes3 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes3 label {
  display: block;
}

#checkboxes3 label:hover {
  background-color: #1e90ff;
}
/*3er grupo de chechbox configuracion (barrio)*/
#checkboxes4 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes4 label {
  display: block;
}

#checkboxes4 label:hover {
  background-color: #1e90ff;
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<article class="content content items-list-page">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div id="div_notify3">
        <div id="notify3" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message3"><img src="<?=base_url()?>/assets/img/iconocargando.gif"></div>
        </div>
		 </div>
         <div id="div_notify_elec">
             
         </div>
            <!-- paneles -->

                        
                           
							
                        
                    
        <div class="grid_3 grid_4">
            <h5><?php echo $this->lang->line('Client Group') . '- ' . $group['title'] ?></h5> 
			
                        <a href=""  class="btn btn-primary btn-md" onclick="abrir_modal_sms(event)"><i
                        class="fa fa-envelope"></i>Enviar mensajes de Grupo</a>

			<a href="#" onclick="redirect_to_export()" class="btn btn-success btn-md">Exportar a Excel .XLSX</a>
<!-- <a href=""  class="btn btn-danger btn-md" onclick="abrir_modal_corte_usuarios(event)"><i
                        class="fa fa-envelope"></i>Cortar Usuarios</a>-->

            <hr>
            <table id="#fcliente" class="table-striped" cellspacing="0" width="100%">
                <thead>
                <tr >
                
                <th><?php echo $this->lang->line('Edificio') ?></th> 
                  <th><?php echo $this->lang->line('Edificio') ?></th> 


                </tr>
                </thead>
                <tbody>
                    
                </tbody>
                 
                <tfoot>
                    
                </tfoot>
              </table>
            
        </div>
        
    </div>

</article>

<script type="text/javascript">

   
    var tb;
    $(document).ready(function () {

        tb=$('#fclientstable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('clientgroup/grouplist') . '?id=' . $group['id']; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
				
            ],	
            "language":{
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                     "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"

                }
			

        });
		

    });


     var tb;
    $(document).ready(function () {

        tb=$('#fcliente').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('clientgroup/groupedificio')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                
            ],
            )};  
        });
</script>
