<article class="content">
	
    <div class="card card-block">
        <?php $lista_productos_orden=$this->db->get_where('transferencia_products_orden',array('tickets_id'=>$id_orden_n))->result_array();
		$traslados=$this->db->get_where('temporales',array('corden'=>$thread_info['codigo']))->row();
		$factura=$this->db->get_where('invoices',array('tid'=>(($thread_info['id_invoice']==0 || $thread_info['id_invoice']==null || $thread_info['id_invoice']=="")? $thread_info['id_factura'] : "")))->row();
		$equipo=$this->db->get_where('equipos',array('mac'=>$thread_info['macequipo']))->row();?>
        
        
    </div>
	
    <div class="card card-block">
        <?php if ($response == 1) {
            echo '<div id="notify" class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message">' . $responsetext . '</div>
        </div>';
        } else if ($response == 0) {
            echo '<div id="notify" class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message">' . $responsetext . '</div>
        </div>';
        } else {
            echo ' <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>';

        } ?>
		
		
		
        <div class="grid_3 grid_4"><h4><?php echo $thread_info['subject']. ' Nº '.$thread_info['codigo'] ?> </h4>			
			
            <p class="card card-block"><?php
				if ($factura->television!=='no'){
					$tv = $factura->television;
				}else{
					$tv = '';
				}
				if ($factura->combo!=='no'){
					$inter = $factura->combo;
				}else{
					$inter = '';
				}
				echo '<strong>Created the: </strong> ' . $thread_info['created'];
                echo '<br><strong>User:</strong> ' . $thread_info['name'] .' '.$thread_info['dosnombre'].' '. $thread_info['unoapellido'].' '.$thread_info['dosapellido'];
				echo '<br><strong>Document:</strong> ' . $thread_info['documento'];
				echo '<br><strong>Subscriber:</strong> ' . $thread_info['abonado'];
				echo '<br><strong>Cell phone:</strong> ' . $thread_info['celular'];
				echo '<br><strong>Direction:</strong> ' . $thread_info['nomenclatura'].' '. $thread_info['numero1']. $thread_info['adicionauno'].' N°'. $thread_info['numero2']. $thread_info['adicional2'].' - '. $thread_info['numero3'];
				echo '<br><strong>Reference:</strong> ' . $thread_info['residencia'].'/'. $thread_info['referencia'];
				echo '<br><strong>Neighborhood:</strong> ' . $barrio2['barrio'];
                echo '<br><strong>Condition:</strong> <span id="pstatus">' . $thread_info['status'];
				//echo '<br><strong>Servicios Contratados:</strong> <span id="pstatus">' . $tv.' '.$inter;
				/*echo '<br><strong>Equipo Asignado:</strong> <span id="pstatus">' . $thread_info['macequipo'].'<strong>'.$equipo->t_instalacion.'</strong><strong> V:</strong>'.$equipo->vlan.'<strong> N:</strong>'.$equipo->nat.'<strong> PN:</strong>'.$equipo->puerto*/;
                ?></p>
				

			<?php //echo '<h4>Detalles:</h4><code class="card card-block">' . $thread_info['section']?>
        <!--</code>
			<table  class="table table-hover table-condensed" width="100%"> -->

			<?php echo '<h4>Details:</h4><code class="card card-block"><h5 style="text-decoration: underline;">' .$thread_info['detalle'].'</h5>'.strip_tags($thread_info['section'].' '.$thread_info['problema'],'<p>');
	
	if ($thread_info['detalle']=='Traslado'){ echo $traslados->nomenclatura.' '.$traslados->nuno.$traslados->auno.' Nº '.$traslados->ndos.$traslados->ados.' - '.$traslados->ntres.'<br>'
			.$local['localidad'].'/'.$barrio['barrio'].'/'.$traslados->residencia.'/'.$traslados->referencia;}?>
	
			
		</code>		
			
					
			<table  class="table-responsive tfr my_stripe" width="80%">
				

            <thead>
                <tr>
                    <th colspan="3" ><h5 align="left"><strong>Material used in the Order</strong></h5></th>
                </tr>
                <tr>
                    <th style="text-align: center;" width="10%">PID</th>
                    <th style="text-align: center;" width="40%">Name</th>
                    <th style="text-align: center;" width="30%">Total quantity.</th>
                    <th style="text-align: center;" width="20%">Value to Transfer </th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($lista_productos_orden as $key => $prod) { $prod_padre=$this->db->get_where('products',array('pid'=>$prod['products_pid']))->row(); ?>        
                    <tr>
                        <td style="text-align: center;" width="10%"><?=$prod_padre->pid?></td>
                        <td style="text-align: center;" width="30%"><?=$prod_padre->product_name?></td>
                        <td style="text-align: center;" width="20%"><?=$prod['cantidad']?></td>
                        <td style="text-align: center;" width="20%"><a onclick="eliminar_prod_lista(<?=$prod['idtransferencia_products_orden']?>)"><img src="<?=base_url()?>/assets/img/trash.png"></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
		<hr>		
            <?php foreach ($thread_list as $row) { ?>


                <div class="form-group row">


                    <div class="col-sm-10">
                        <div class="card card-block"><?php
                            if ($row['custo']) echo 'Customer <strong>' . $row['custo'] . '</strong> Replied a las' . $row['cdate'] .'<br><br>';

                            if ($row['emp']) echo 'Tecnico <strong>' . $row['emp'] . '</strong> Respondio el ' . $row['cdate'] .'<br><br>';

                            echo $row['message'] . '';
                            if ($row['attach']) echo '<strong><br>Documentacion: </strong><a href="' . base_url('userfiles/support/' . $row['attach']) . '"><br><br>';?>
							<img width="20%" src="<?php if ($row['attach']) echo  base_url('userfiles/support/' . $row['attach']);?>"/></a><br><br>
							<?php if ($this->aauth->get_user()->roleid >= 3) { ?>
							<a class="btn btn-danger" onclick="eliminar_documento(<?php echo $row['id']?>)" > <i class="icon-trash-o "></i> Remove</a>
                        	<?php } ?>    
						</div>
							
                    </div>
                </div>
            <?php }
            echo form_open_multipart('tickets/thread?id=' . $thread_info['idt']); ?>
			
            <h5><?php echo $this->lang->line('Your Response') ?></h5>
            <hr>
			<div class="form-group row">
				<div class="col-sm-12">
				<select name="solucion" class="form-control">
					<option value="">-</option>
					<option value="damaged tube">damaged tube</option>
					<option value="General Maintenance">General Maintenance</option>
					<option value="Burnt plug">Burnt plug</option>
					<option value="Instalaciones Internas en Mal estado">Internal facilities in poor condition</option>
					<option value="Manipulacion del Usuario">User manipulation</option>
					<option value="Daño General">Overall Damage</option>
					<option value="Elementos Quemados">Burnt Items</option>
				</select>
				</div>
			</div>
			
            <div class="form-group row">               

                <div class="col-sm-12">
                        <textarea class="summernote" placeholder=" Message" autocomplete="false" rows="10" name="content"></textarea>
                </div>
            </div>
	   
                     
                    
            <div class="form-group row">

                <label class="col-sm-2 col-form-label" for="name">Documentation</label>

                <div class="col-sm-6">
                    <input type="file" name="userfile" size="20"/><br>
                    <small>(docx, docs, txt, pdf, xls, png, jpg, gif)</small>
                </div>
            </div>

			<?php if ($thread_info['status'] == 'Pendiente' || $thread_info['status'] == 'Realizando' || $this->aauth->get_user()->roleid == 5) { ?>
            <div class="form-group row">
				<div class="col-sm-2">
					<a href="#pop_model" data-toggle="modal" onclick="funcion_status();" data-remote="false" class="btn btn- btn-red mb-1" title="Change Status"><span class="icon-tab"></span> Change Status</a>
				</div>
				<?php if ($thread_info['status'] == 'Realizando' || $this->aauth->get_user()->roleid == 5) { ?>
                <label class="col-sm-1 col-form-label"></label>

                <div class="col-sm-2">
                    <input type="submit" id="document_add" class="btn btn- btn-blue mb-1"
                           value="Keep record" data-loading-text="Updating...">
                </div>
			<!--	<div class="col-sm-2">			
		 			<a href="#pop_model2" data-toggle="modal" onclick="funcion_status();" data-remote="false" class="btn btn- btn-green mb-1" title="Change Status"
                	> ASIGNAR EQUIPO</a>
				</div>-->
				<div class="col-sm-2">
					<a href="#pop_model3" data-toggle="modal" onclick="funcion_status();" data-remote="false" class="btn btn- btn-orange mb-1" title="Change Status">Assign material</a>
				</div>
				
			<!--	<div class="col-sm-2">
					<a href="#pop_model4" data-toggle="modal" onclick="funcion_status();" data-remote="false" class="btn btn- btn-black mb-1" title="Change Status"><span></span> DIVIDIR ORDEN</a>
				</div>-->
                <?php if($orden->detalle=="Suspension Internet" || $orden->detalle=="Suspension Combo"){ ?>
                <div class="col-sm-2" style="margin-left: 8%;">          
                    <a href="#pop_model5" data-toggle="modal" onclick="funcion_status();" data-remote="false" class="btn btn- btn-blue mb-1" title="Change Status"
                    > DEVOLVER EQUIPO</a>
                
                </div>
                <?php }} ?>
                
				
            </div>
            
			<?php /*}if ($thread_info['status'] == 'Resuelto'){
					echo '<h2 class="btn btn-oval btn-success">RESUELTO</h2>';
				}if ($thread_info['status'] == 'Anulada'){
					echo '<h2 class="btn btn-oval btn-danger">ANULADA</h2>';
				*/} ?>	

            </form>
        </div>
	<hr style="height:1px;border:none;color:#333;background-color:#333;">
    <hr style="height:1px;border:none;color:#333;background-color:#333;">
    
    <h1>Full Name Who Receives</h1>
    <div id="bloque_firmas_edicion" <?=($orden->nombre_firma!=null || $orden->nombre_firma!="") ? 'style="display:none;"':'' ?>>
    <div class="form-group row">
            <label class="col-sm-2 col-form-label"
                               for="pay_cat">Full name</label>

                        <div class="col-sm-6">                                    
                                <input placeholder="Full Name Who Receives" type="text" name="nombre" id="nombre" class="form-control" value="<?=$orden->nombre_firma ?>">
                        </div>

    </div>
     <div class="form-group row">
            <label class="col-sm-2 col-form-label"
                               for="pay_cat">DNI</label>

                        <div class="col-sm-6">                                    
                                <input placeholder="Cedula" type="text" name="Cedula" id="Cedula" class="form-control" value="<?=$orden->cc_firma ?>">
                        </div>
                        
    </div>
    <div class="form-group row">
            <label class="col-sm-2 col-form-label"
                               for="pay_cat">Relationship</label>

                        <div class="col-sm-6">                                    
                                <input placeholder="Parentesco" type="text" name="Parentesto" id="Parentesto" class="form-control" value="<?=$orden->parentesco_firma ?>">
                        </div>
                        
    </div>

    <div class="form-group row">
            

                        <div class="col-sm-6">                                    
                                <img onerror="this.style.display='none'" src="<?=base_url()."assets/firmas_digitales/orden_".$thread_info['codigo'].".png?".microtime(); ?>">
                        </div>

                        
    </div>
    <div id="notify_firma" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"><strong>Success:</strong> Datos de quien resive guardados</div>
        </div>
    <a id="firma_link" href="<?=base_url().'customers/firmadigital?id='.$thread_info['codigo'].'&type=orden' ?>" class="btn btn-primary">Add Signature</a><br><br> <a id="guardar_datos_firma" href="#" class="btn btn-success">Keep</a>
</div>
    <br>
<div id="bloque_firmas_estatico" <?=($orden->nombre_firma==null || $orden->nombre_firma=="") ? 'style="display:none;"':'' ?> >
    <img onerror="this.style.display='none'" src="<?=base_url()."assets/firmas_digitales/orden_".$thread_info['codigo'].".png?".microtime(); ?>">
    <table >
    <tr>
        <td><h5>Full name</h5></td>
        <td width="15px;"></td>
        <td style="vertical-align: top;" id="i_nombre"><i><?=$orden->nombre_firma ?></i></td>
    </tr>
    <tr>
        <td><h5>Cedula</h5></td>
        <td width="15px;"></td>
        <td style="vertical-align: top;"><i id="i_cc"> <?=$orden->cc_firma ?></i></td>
    </tr>
    <tr>
        <td><h5>Relationship</h5></td>
        <td width="15px;"></td>
        <td style="vertical-align: top;"><i id="i_parentesco"> <?=$orden->parentesco_firma ?></i></td>
    </tr>
</table>
<a href="#" class="btn btn-success" id="btn-habilitar-edicion">Habilitar Edicion</a>
</div>
    </div>

    <div id="pop_model5" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Devolucion de equipo</h4>
            </div>

            <div class="modal-body">
                <form id="form_model3">
                <div id="customerpanel" class="row">
                    <label for="codigo"
                           class="caption col-sm-6 col-form-label">Codigo equipo<span
                                style="color: red;">*</span></label>                    
                    <div class="col-sm-12">
                        <?php $lista_equipos=$this->db->get_where("equipos",array('asignado' =>$orden->cid))->result_array(); ?>
                        <select name="codigo" class="form-control">
                            <?php foreach ($lista_equipos as $key => $equipo) { ?>
                                <option><?= $equipo['codigo']." | ".$equipo['mac']." | ".$equipo['serial'] ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>
                                        
                </div>
                <div id="customerpanel" class="row">
                    <label for="toBizName"
                           class="caption col-sm-2 col-form-label">Motivo<span
                                style="color: red;">*</span></label>
                    <input type="hidden" name="iduser" value="<?php echo $orden->cid ?>"></input>

                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="nota">
                    </div>
                                        
                </div>
                <div id="customerpanel" class="form-group row">
                    <label for="toBizName"
                           class="caption col-sm-2 col-form-label">Estado<span
                                style="color: red;">*</span></label>                    
                    <div class="col-sm-12">
                        <select name="estado" class="form-control">
                            <option value="Bueno">Bueno</option>
                            <option value="Malo">Malo</option>                      
                        </select>
                    </div>
                                        
                </div>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Volver</button>
                        <input type="hidden" id="action-url" value="customers/dev_equipo">
                        <button type="button" class="btn btn-primary"
                                id="submit_model3">Devolver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</article>
<script type="text/javascript">
    
    $(function () {
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['fullscreen', ['fullscreen']],
                ['codeview', ['codeview']]
            ]
        });
    });

</script>

<script type="text/javascript">
    var estado_actual="<?=$thread_info['status']?>";
    function validar_estado(){
        var status_selected= $('#estadoid option:selected').text();
		/*if(estado_actual=="Realizando" && status_selected=="Pendiente"){
			$("#submit_model").prop("disabled","true");
		}else if(estado_actual=="Realizado" && status_selected=="Realizando"){
			$("#submit_model").prop("disabled","true");
		}*/
        if(estado_actual==status_selected){
            $("#submit_model").prop("disabled","true");
        }else{
            if(estado_actual=="Realizando" && status_selected=="Pendiente"){
                 $("#submit_model").prop("disabled","true");
            }else if(estado_actual=="Realizado" && status_selected=="Realizando"){
                $("#submit_model").prop("disabled","true");
            }
        }
    }
    function funcion_status(){
        //aqui estoy toca terminar esto de que muestre y n el div
        var x= $('#estadoid option:selected').text();
        console.log(x);
        if(x=='Pendiente'|| x=='Anular'){
            $("#fecha_final_div").css('visibility','hidden');
            $("#submit_model").removeAttr("disabled");
        }else{
            $("#fecha_final_div").css('visibility','visible');    
             $("#submit_model").prop("disabled","true");
        }
        validar_estado();
        
    }


    <?php $fec=new DateTime($thread_info['created'] );  ?>
    var fecha_ano='<?= $fec->format("Y-m-d") ?>';
    function funcion_fecha(){

            fecha_inicialjs=new Date(fecha_ano);
            var fecha_finaljs=new Date($("#fecha_final").val());
            if(fecha_finaljs<fecha_inicialjs){
                $("#fecha_final").val('');
                $("#submit_model").prop("disabled","true");
            }else{
                $("#submit_model").removeAttr("disabled");
            }
            validar_estado();
    }
</script>

<div id="pop_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('Change Status'); ?></h4>
            </div>

            <div class="modal-body">
                <form id="form_model">


                    <div class="row">
                        <div class="col-xs-12 mb-1"><label
                                    for="pmethod"><?php echo $this->lang->line('Mark As') ?></label>
                            <select id="estadoid" name="status" class="form-control mb-1" onchange="funcion_status();">                                
                                <option value="Pendiente" <?= ($thread_info['status']=="Pendiente")? 'selected="true"' :'' ?> >Earring</option>
                                <option value="Realizando" <?= ($thread_info['status']=="Realizando")? 'selected="true"' :'' ?> >Doing</option>								
								<option value="Anulada" <?= ($thread_info['status']=="Anulada")? 'selected="true"' :'' ?> >Cancel</option>
								<?php if ($thread_info['status']=='Realizando'){ ?>								
								<option value="Resuelto" <?= ($thread_info['status']=="Resuelto")? 'selected="true"' :'' ?> >Resolved</option>
								<?php }; ?>
                            </select>

                        </div>
                    </div>
					<?php if ($thread_info['detalle']=='Reconexion Combo' or $thread_info['detalle']=='Reconexion Internet') {?>
					<div class="row">
                        <div class="col-xs-12 mb-1"><label
                                    for="pmethod">Package</label>
                            <select id="estadoid" name="paquete" class="form-control mb-1" onchange="funcion_status();">
								<option value="">-</option>
								<?php
									foreach ($paquete as $row) {
										$cid = $row['pid'];
										$title = $row['product_name'];
										echo "<option value='$title'>$title</option>";
									}
								?>
                            </select>

                        </div>
						
                    </div>
					<?php } ?>
					<?php if ($thread_info['detalle']=='Toma Adicional') {?>
					<div class="row">
                        <div class="col-xs-12 mb-1"><label
                                    for="pmethod">Puntos</label>
                            <select name="puntos" class="form-control mb-1" onchange="funcion_status();">
								<option value="">no</option>
								<?php for ($i=1;$i<=15;$i++){
								echo '<option value="'.$i.'">'.$i.'</option>';}?>
                            </select>

                        </div>
						
                    </div>
					<?php } ?>
                    <div class="row" id="fecha_final_div">
                        <div class="col-xs-12 mb-1" ><label>Final date</label>
                            <input type="date" class="form-control" id="fecha_final" onchange="funcion_fecha()" name="fecha_final">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control required"
                               name="tid" id="invoiceid" value="<?php echo $thread_info['idt'] ?>">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo $this->lang->line('Close'); ?></button>
                        <input type="hidden" id="action-url" value="tickets/update_status">
                        <button type="button" class="btn btn-primary"
                                id="submit_model"><?php echo $this->lang->line('Change Status'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="pop_model2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Asignar Equipo</h4>
            </div>

            <div class="modal-body">
                <form id="form_model2">
                    <div class="frmSearch col-sm-6">
						<label for="cst" class="caption col-form-label">Burcar equipo</label>
                        <div class="">
							<input type="hidden" name="iduser" value="<?php echo $thread_info['id'] ?>"></input>
							<input type="text" class="form-control" name="cst" id="equipo-box" placeholder="Ingrese mac del equipo" autocomplete="off"/>
                            <div id="equipo-box-result"></div>
                        </div>
                    </div>
				<div class="frmSearch col-sm-6">
                    <label class="caption col-form-label">Equipo mac<span style="color: red;">*</span></label>
                    <div class="">
						<input type="hidden" name="idequipo" id="customer_id" value="0">
                        <input type="text" class="form-control" name="mac" id="customer_name">
                    </div>
                </div>
				<div class="frmSearch col-sm-6">
                        <label for="pmethod" class="caption col-form-label">Tipo de instalacion</label>
						<div>
                            <select id="tinstalacion" name="tinstalacion" class="form-control mb-1" onchange="funcion_status();validaciones_campos();">
								<option value="null">-</option>
								<option value="EOC">EOC</option>
								<option value="FTTH">FTTH</option>
                            </select>
                        </div>
                </div>
				
				<div class="frmSearch col-sm-6" id="eoc_div"  >
                        <label for="pmethod" class="caption col-form-label">Master</label>
						<div class="">
                            <input type="text" name="master" class="form-control mb-1" placeholder="master">
                        </div>
                    </div>
                    <div id="ftth_div" style="display: none;">
                    <div class="frmSearch col-sm-6">
                        <label for="pmethod" class="caption col-form-label">Vlan</label>
                        <div class="">
                            <select name="vlan" class="form-control mb-1" onchange="funcion_status();">
                                <option value="null">-</option>
                                <option value="101">101</option>
                                <?php for ($i=1;$i<=36;$i++){
                                echo '<option value="'.$i*'10'.'">'.$i*'10'.'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
				<div class="frmSearch col-sm-6">
                        <label for="pmethod" class="caption col-form-label">Caja Nat</label>
						<div class="">
                            <input type="text" class="form-control mb-1" name="nat" placeholder="Numero de caja NAT"></input>
                        </div>
                    </div>
			<div class="frmSearch col-sm-6">
                        <label for="pmethod" class="caption col-form-label">Puerto Nat</label>
						<div>
                            <select name="puerto" class="form-control mb-1" onchange="funcion_status();">
								<option value="null">-</option>
								<?php for ($i=1;$i<=16;$i++){
								echo '<option value="'.$i.'">'.$i.'</option>';}?>
                            </select>
                        </div>
                    </div>
                    </div>
					<br>
                    <div style="text-align: right;">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Volver</button>
                        <input type="hidden" id="action-url" value="tickets/asig_equipo">
                        <button type="button" class="btn btn-primary"
                                id="submit_model2">Asignar</button>
			
                    </div>
		
                </form>
            </div>
        </div>
    </div>
</div>
<div id="pop_model3" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Asignar Material</h4>
            </div>
			<div class="modal-body">
                <form id="form_model3">

            <div class="form-group row">
                               
        <div class="col-sm-10">
			<label class="col-sm-4 col-form-label" for="name">Nombre del articulo</label> 
            <select class="form-control select-box" id="lista_productos" name="lista_productos[]" multiple="multiple" style="width: 100%;">
                <?php foreach ($lista_productos_tecnico as $key => $producto) { ?>
                    <option value="<?=$producto['pid']?>"  data-qty="<?=$producto['qty']?>" data-pid="<?=$producto['pid']?>" data-product_name="<?=$producto['product_name']?>" ><?=$producto['product_name']?></option>
               <?php } ?>
            </select>
        </div>
                     </div>   
                     <table width="80%" style="text-align: center;" class="table-responsive tfr my_stripe">
                            <thead >
                                <tr>
                                    <th style="text-align: center;" width="10%">PID</th>
                                    <th style="text-align: center;" width="30%">Nombre</th>
                                    <th style="text-align: center;" width="20%">Cantidad Tot.</th>
                                    <th style="text-align: center;" width="20%">Valor a Transferir</th>
                                </tr>
                            </thead>
                            <tbody id="itemsx">
                                <tr id="remover_fila">
                                    <td>PID</td>
                                    <td>Nombre</td>
                                    <td>##</td>
                                    <td><input type="number" name="" data-max="5" data-pid="0" class="form-control" onfocusout="validar_numeros(this);" disabled></td>   
                                </tr>
                            </tbody>
                        </table>
					    <br>
                        <input  type="button" class="btn btn-primary" value="Agregar" onclick="guardar_productos()">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
                                               
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="pop_model4" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Dividir Orden</h4>
            </div>

            <div class="modal-body">
                <form id="form_model4">
					<input type="hidden" class="form-control required"
                               name="id" value="<?php echo $thread_info['idt'] ?>">

                    <div class="form-group row">
                    <div class="frmSearch">
						<label for="cst" class="caption col-sm-2">Servicio a Instalar</label>
                        <div class="col-sm-6">
							<select name="servicio" class="form-control mb-1">
								<option value="television">Television</option>
								<option value="internet">Internet</option>
                            </select>
                        </div>
                    </div>
                	</div>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Volver</button>
					<input type="hidden" id="action-url" value="tickets/dividir"></input>
                        <button type="button" class="btn btn-primary"
                                id="submit_model4">Dividir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var id_orden_n="<?=$id_orden_n?>";

    $("#lista_productos").select2();
    let listaProductos=[];
    $("#lista_productos").on('select2:select',function(e){
                var itemSeleccionado;
                itemSeleccionado= {pid:e.params.data.element.dataset.pid,qty:e.params.data.element.dataset.qty,product_name:e.params.data.element.dataset.product_name};

                
                listaProductos.push(itemSeleccionado);
                $("#remover_fila").html('');
                var max_var=itemSeleccionado.qty;
                if(max_var<0){
                    max_var=0;
                }
                $("#itemsx").append('<tr id="fila_'+itemSeleccionado.pid+'"> <td>'+itemSeleccionado.pid+'</td><td>'+itemSeleccionado.product_name+'</td>       <td>'+itemSeleccionado.qty+'</td>           <td><input type="number" name="" data-max="'+max_var+'" data-pid="'+itemSeleccionado.pid+'" class="form-control" onfocusout="validar_numeros(this);" value="'+max_var+'"></td>     </tr>');

console.log(e);
console.log(itemSeleccionado);
                 
            });

        $("#lista_productos").on("select2:unselect",function(e){
        console.log("eliminado "+e.params.data.element.dataset.pid);
        
        $("#fila_"+e.params.data.element.dataset.pid).remove();
        var remove_index=0;
        $(listaProductos).each(function(index,value){
            if(e.params.data.element.dataset.pid==value.pid){
                remove_index=index;
            }    
            
            
        });
        listaProductos.splice(remove_index,1);
        
    });


    function guardar_productos(){
        var datos_lista=$("#lista_productos").val();
        if(datos_lista==null){
            $("#lista_productos").attr("required", true);
            $("#document_add").click();
            setTimeout(function(){
            $("#lista_productos").attr("required", false);    
            },1000);
            

        }else{

         $.post(baseurl+"tickets/add_products_orden",{lista:listaProductos,id_orden_n:id_orden_n},function(data){
                alert("Productos Agregados");
                window.location.reload();
            });   
        }
    }

    function validar_numeros (input){
        var valorInput =parseInt($(input).val());
        var valorMaximo = parseInt($(input).data('max'));
        var valor_pid=parseInt($(input).data('pid'));
        if(isNaN(valorInput)){
            $(input).val(0);
        }else if(valorInput<0){
            $(input).val(0);    
        }else if(valorInput>valorMaximo){
            $(input).val(valorMaximo);
        }
        // cambia el valor total del la listaProductos y pasar los valores al input para que se envien al submit
        valorInput =parseInt($(input).val());
        var index_cambiar=0;
        $(listaProductos).each(function(index,value){
            if(value.pid==valor_pid){
                index_cambiar=index;
            }
        });
        listaProductos[index_cambiar].qty=valorInput;
    }

    function eliminar_prod_lista(idtransferencia_products_orden){
        var confirmacion =confirm("¿Deseas realmente eliminar este item ?");
        if(confirmacion==true){
            $.post(baseurl+"tickets/eliminar_prod_lista",{id:idtransferencia_products_orden},function(data){
                alert("Producto Eliminado");
                window.location.reload();
            });
        }
    }
	function eliminar_documento(id){
        var confirmacion = confirm("Deseas Eliminar esta orden ?");
        if(confirmacion==true){
            $.post(baseurl+"tickets/delete_documento",{deleteid:id},function (data){
                alert("Orden Eliminada...");                
                window.location.reload();
            },'json');
      }
    }
    function validaciones_campos(){
        var ck=$("#tinstalacion option:checked").val();
        if(ck=="EOC"){
            $("#eoc_div").show();
            $("#ftth_div").hide();
        }else{
            $("#eoc_div").hide();
            $("#ftth_div").show();
        }
        console.log(ck);

    }

$("#guardar_datos_firma").click(function(ev){
        ev.preventDefault();
        guardar_datos_firma(1);
});
function guardar_datos_firma(use){
    var nombre=$("#nombre").val();
        var cc=$("#Cedula").val();
        var parentesco=$("#Parentesto").val();
        var url=baseurl+"tickets/guardar_datos_firma?codigo=<?=$thread_info['codigo']?>";
        $.post(url,{'nombre':nombre,'cc':cc,'parentesco':parentesco},function(data){
            console.log(data);
            if(use==1){
                    $("#notify_firma").fadeIn(1000).fadeOut(3000,'swing',function(){
                     $("#bloque_firmas_edicion").hide();
                     $("#i_nombre").text(nombre);
                     $("#i_cc").text(cc);
                     $("#i_parentesco").text(parentesco);
                     $("#bloque_firmas_estatico").show();   
                });    
            }
            
        });
}
$("#btn-habilitar-edicion").click(function(ev){
    ev.preventDefault();
    $("#bloque_firmas_edicion").show();
    $("#bloque_firmas_estatico").hide();    
});
$("#firma_link").click(function(ev){
        guardar_datos_firma(2);
});
    
</script>