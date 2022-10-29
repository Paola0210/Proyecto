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

<article class="content content items-list-page">
    <div class="card card-block">
        
        <div id="div_notify_add_client_to_apartament">
     
		 </div>
     
            <!-- paneles -->

                        
                           
							
                        
                    
        <div class="grid_3 grid_4">
            <?php $url_corporacion=base_url().'clientgroup/buildings_corporation?id='.$edificio->id_corporacion; ?>
            <h5><?php echo $this->lang->line('Apartaments Building') . ' - '.$edificio->nombre_edificio   ?></h5> <a href="<?= $url_corporacion?>"><h6> <?php  echo $this->lang->line('Corporation')." - ".$corporacion['title']?></h6></a>
			
                       <!-- <a href=""  class="btn btn-primary btn-md" onclick="abrir_modal_sms(event)"><i
                        class="fa fa-envelope"></i>Enviar mensajes de Grupo</a>

			<a href="#" onclick="redirect_to_export()" class="btn btn-success btn-md">Exportar a Excel .XLSX</a> -->


            <hr>
            <table id="t_apartamentos" class="table-striped center" cellspacing="0" width="100%">
                <thead>
                <tr >
                    <th>#</th> 
                    <th><?php echo $this->lang->line('ID') ?></th> 
                  <th><?php echo $this->lang->line('Nombre') ?></th> 
                  <th><?php echo $this->lang->line('Arrendatario') ?></th> 
                  <th><?php echo $this->lang->line('Cuartos') ?></th> 
                  <th><?php echo $this->lang->line('Piso') ?></th> 
                  <th><?php echo $this->lang->line('Aire') ?></th> 
                  <th><?php echo $this->lang->line('Banos') ?></th> 
                  <th><?php echo $this->lang->line('Estado') ?></th> 
                  <th><?php echo $this->lang->line('Descripcion') ?></th> 
                  
                  <th><?php echo $this->lang->line('Actions') ?></th> 
                  


                </tr>
                </thead>
                <tbody>
                    
                </tbody>
                 
                <tfoot>
                    <tr>
                    <th>#</th>
                    <th><?php echo $this->lang->line('ID') ?></th> 
                       <th><?php echo $this->lang->line('Nombre') ?></th> 
                          <th><?php echo $this->lang->line('Arrendatario') ?></th> 
                          <th><?php echo $this->lang->line('Cuartos') ?></th> 
                          <th><?php echo $this->lang->line('Piso') ?></th> 
                          <th><?php echo $this->lang->line('Aire') ?></th> 
                          <th><?php echo $this->lang->line('Banos') ?></th> 
                          <th><?php echo $this->lang->line('Estado') ?></th>  
                          <th><?php echo $this->lang->line('Descripcion') ?></th> 
                          <th><?php echo $this->lang->line('Actions') ?></th> 
                          
                      </tr>
                </tfoot>
              </table>
            
        </div>
        
    </div>

</article>
<div id="modal_usuarios_asignar" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h3 align="center" id="titulo-add-cl">Usuarios Para Agregar al Apartamento</h3>
                
            </div>
            <div class="modal-body">
                
                
                    <div class="table-responsive">
                        <table id="tb_clientes" class="table table-hover" cellspacing="0"  width="100%">
                            <thead>
                            <tr>
                                <th>Abonado</th>                  
                                <th>Nombres</th>   
                                <th>T. Documento</th>
                                <th>Documento</th>
                                <th>Estado</th>
                                <th>Accion</th>
                                

                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Abonado</th>                  
                                    <th>Nombres</th>   
                                    <th>T. Documento</th>
                                    <th>Documento</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                    
                
                <br>
            </div>
            <div class="modal-footer">
                
                
                <button type="button" class="btn btn-primary" onclick="$('#modal_usuarios_asignar').modal('hide');">Aceptar</button>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


   
    var tb;
    var tb_clientes;
    var id_apartamento=0;
    var nombre_apto
    $(document).on("click",".asignar-cliente",function(ev){
        ev.preventDefault();
        id_apartamento=$(this).data("id-apartamento");
        nombre_apto=$(this).data("nombre");
        $("#titulo-add-cl").html("Asignar Cliente al Apartamento "+$(this).data("nombre"));
        $("#modal_usuarios_asignar").modal("show");
    });
    $(document).on("click",".asignar-cliente-tb-cliente",function(ev){
        ev.preventDefault();
        var id_cliente=$(this).data("id-cl");
        var nombre_completo=$(this).data("nombre-completo");
        var documento=$(this).data("documento");
        $.post(baseurl+"clientgroup/add_clente_apartamento",{"id_cliente":id_cliente,"id_apartamento":id_apartamento},function(data){
            tb.ajax.url( baseurl+"clientgroup/apartaments_list?id=<?=$edificio->id ?>").load();               
            var url_cliente=baseurl+"customers/view?id="+id_cliente;
            var texto1 ="<strong>Success</strong> : Client <b><a href='"+url_cliente+"'>"+nombre_completo+"</a></b> with identification number <b><a href='"+url_cliente+"'>"+documento+"</a></b> was successfully assigned to apartment <b>"+nombre_apto+"</b> ID <b>"+id_apartamento+"</b>";
            mostrar_alerta1("div_notify_add_client_to_apartament",1,texto1);
            $("#modal_usuarios_asignar").modal("hide");     
        });
    });
    $(document).ready(function () {

		tb=$('#t_apartamentos').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('clientgroup/apartaments_list') . '?id=' . $edificio->id; ?>",
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
        tb_clientes=$('#tb_clientes').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('clientgroup/clientes_a_asignar') ; ?>",
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


    
</script>
