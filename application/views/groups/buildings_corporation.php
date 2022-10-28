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
            <h5><?php echo "<a href='".base_url()."clientgroup'>".$this->lang->line('Corporation')."</a> ". $this->lang->line('Buildings') . ' - ' . $group['title'] ?></h5> 
			
                       <!-- <a href=""  class="btn btn-primary btn-md" onclick="abrir_modal_sms(event)"><i
                        class="fa fa-envelope"></i>Enviar mensajes de Grupo</a>

			<a href="#" onclick="redirect_to_export()" class="btn btn-success btn-md">Exportar a Excel .XLSX</a> -->


            <hr>
            <table id="t_edificios" class="table-striped" cellspacing="0" width="100%">
                <thead>
                <tr >
                    <th>#</th> 
                  <th><?php echo $this->lang->line('Nombre') ?></th> 
                  <th><?php echo $this->lang->line('Numero1') ?></th> 
                  <th><?php echo $this->lang->line('Orientacion') ?></th> 
                  <th><?php echo $this->lang->line('Numero2') ?></th> 
                  <th><?php echo $this->lang->line('Adicional1') ?></th> 
                  <th><?php echo $this->lang->line('Adicional2') ?></th> 
                  <th><?php echo $this->lang->line('Estado') ?></th> 
                  <th><?php echo $this->lang->line('Actions') ?></th> 
                  


                </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($lista_edificios_corporacion as $key => $v1) {
                        echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$v1['nombre_edificio']."</td>";
                            echo "<td>".$v1['numero1']."</td>";
                            echo "<td>".$v1['orientacion']."</td>";
                            echo "<td>".$v1['numero2']."</td>";
                            echo "<td>".$v1['adicional1']."</td>";
                            echo "<td>".$v1['adicional2']."</td>";
                            echo "<td>".$v1['estado']."</td>";
                            echo "<td><a href='".base_url()."clientgroup/apartments_building?id=".$v1['id']."' class='btn btn-success btn-xs'><i class='icon-file-text'></i>". $this->lang->line('View') ."</a>&nbsp;<a class='btn btn-warning btn-xs'><i class='icon-pencil'></i>". $this->lang->line('Edit') ."</a></td>";
                        echo "</tr>";
                    $i++;} ?>
                </tbody>
                 
                <tfoot>
                    <tr>
                    <th>#</th>
                    <th><?php echo $this->lang->line('Nombre') ?></th> 
                      <th><?php echo $this->lang->line('Numero1') ?></th> 
                      <th><?php echo $this->lang->line('Orientacion') ?></th> 
                      <th><?php echo $this->lang->line('Numero2') ?></th> 
                      <th><?php echo $this->lang->line('Adicional1') ?></th> 
                      <th><?php echo $this->lang->line('Adicional2') ?></th> 
                      <th><?php echo $this->lang->line('Estado') ?></th> 
                      <th><?php echo $this->lang->line('Actions') ?></th> 
                      </tr>
                </tfoot>
              </table>
            
        </div>
        
    </div>

</article>

<script type="text/javascript">

   
    var tb;
    $(document).ready(function () {

		$('#t_edificios').DataTable({});

    });


    
</script>
