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
            <h5>Propiedades de apartamentos</h5> 
            <a href='<?php echo base_url("propertiesapto/create"); ?>' class='btn btn-cyan btn-xs'><i class='icon-pencil'></i> Nueva Propiedad</a>
			
                       <!-- <a href=""  class="btn btn-primary btn-md" onclick="abrir_modal_sms(event)"><i
                        class="fa fa-envelope"></i>Enviar mensajes de Grupo</a>

			<a href="#" onclick="redirect_to_export()" class="btn btn-success btn-md">Exportar a Excel .XLSX</a> -->


            <hr>
            <table id="t_edificios" class="table-striped" cellspacing="0" width="100%">
                <thead>
                <tr >
                    <th>#</th> 
                  <th><?php echo $this->lang->line('Nombre') ?></th> 
                  <th><?php echo "Tipo" ?></th> 
                  <th><?php echo "Detalle" ?></th> 
                  <th><?php echo $this->lang->line('Actions') ?></th> 
                  
                  


                </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($lista_de_propiedades as $key => $v1) {
                        echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$v1['nombre']."</td>";
                            echo "<td>".$v1['tipo']."</td>";
                            $detalle="";
                            if($v1['tipo']=="numeric"){
                                $detalle="0-".$v1['maximo'];
                            }else if($v1['tipo']=="List"){
                                $detalle=str_replace('"', '', $v1['lista_de_elementos']);
                                $detalle=str_replace('[', '', $detalle);
                                $detalle=str_replace(']', '', $detalle);

                            }
                            echo "<td>".$detalle."</td>";
                            
                            echo '<td><a href="#" data-object-id="'.$v1['id'].'" class="btn btn-danger btn-xs delete-object" title="Delete"><i class="icon-trash-o"></i></a>';
                        echo "</tr>";
                    $i++;} ?>
                </tbody>
                 
                <tfoot>
                    <tr>
                      <th>#</th> 
                  <th><?php echo $this->lang->line('Nombre') ?></th> 
                  <th><?php echo "Tipo" ?></th> 
                  <th><?php echo "Detalle" ?></th> 
                  <th><?php echo $this->lang->line('Actions') ?></th> 
                      
                      </tr>
                </tfoot>
              </table>
            
        </div>
        
    </div>

</article>
<div id="delete_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php "Eliminar Propiedad" ?></h4>
            </div>
            <div class="modal-body">
                <p>Eliminar esta propiedad de apartamento?</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="object-id" value="">
                <input type="hidden" id="action-url" value="propertiesapto/delete_i">
                <button type="button" data-dismiss="modal" class="btn btn-primary"
                        id="delete-confirm"><?php echo $this->lang->line('Delete') ?></button>
                <button type="button" data-dismiss="modal"
                        class="btn"><?php echo $this->lang->line('Cancel') ?></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

   
    var tb;
    $(document).ready(function () {

		$('#t_edificios').DataTable({});

    });


    
</script>

