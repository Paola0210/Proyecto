<!-- BEGIN VENDOR JS-->
<div id="modal-alertas-publico" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                
                <h4 class="modal-title" align="center">Notification</h4>
            </div>
            <div class="modal-body">
                    <h5 id="texto-modal-alertas-publico"></h5>               
            </div>
            <div class="modal-footer">
                
                
                <button type="button" class="btn btn-primary" onclick="$('#modal-alertas-publico').modal('hide')">Accept</button>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    <?php if(isset($msj77)){
        echo "$('#modal-alertas-publico').modal('show');";
        echo "$('#texto-modal-alertas-publico').html('".$msj77."');";
    } ?>

</script>
<script type="text/javascript">

    $('[data-toggle="datepicker"]').datepicker({autoHide: true, format: '<?php echo $this->config->item('dformat2'); ?>'});
    $('[data-toggle="datepicker"]').datepicker('setDate', new Date());
    $('#sdate').datepicker({autoHide: true, format: '<?php echo $this->config->item('dformat2'); ?>'});
    $('#sdate').datepicker('setDate', '<?php echo dateformat(date('Y-m-d', strtotime('-30 days', strtotime(date('Y-m-d'))))); ?>');

    $('#sdate2').datepicker({autoHide: true, format: '<?php echo $this->config->item('dformat2'); ?>'});
    $('#sdate2').datepicker('setDate', '<?php echo dateformat(date('Y-m-d')); ?>');


    $('.date30').datepicker('setDate', '<?php echo dateformat(date('Y-m-d', strtotime('-30 days', strtotime(date('Y-m-d'))))); ?>');

    if(typeof editar_datepickerts === 'function') {
        //ejecucion de funcion para cambiar fechas como sdate3 o como se le coloque pues se esta ejecutando al momento oportuno para hacer la edicion que se desee; solo es crear esta funcion en donde se quiera manejar fechas y listo mirar el ejemplo de views/support/tickets.php
        editar_datepickerts('<?php echo $this->config->item('dformat2'); ?>','<?php echo dateformat(date('Y-m-d', strtotime('-30 days', strtotime(date('Y-m-d'))))); ?>');    
    }
    
</script>
<script src="<?php echo base_url(); ?>assets/myjs/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/js/ui/perfect-scrollbar.jquery.min.js"
        type="text/javascript"></script>
<script src="<?php echo
base_url(); ?>assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/myjs/jquery.dataTables.min.js"></script>


<script type="text/javascript">var dtformat = $('#hdata').attr('data-df');
    var currency = $('#hdata').attr('data-curr');
    ;</script>
<script src="<?php echo base_url('assets/myjs/custom.js') . APPVER; ?>"></script>
<script src="<?php echo base_url('assets/myjs/basic.js') . APPVER; ?>"></script>
<script src="<?php echo base_url('assets/myjs/control.js') . APPVER; ?>"></script>

<script src="<?php echo base_url('assets/js/core/app.js') . APPVER; ?>" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/core/app-menu.js" type="text/javascript"></script>
<script type="text/javascript">
    $.ajax({

        url: baseurl + 'manager/pendingtasks',
        dataType: 'json',
        success: function (data) {
            $('#tasklist').html(data.tasks);
            $('#taskcount').html(data.tcount);

        },
        error: function (data) {
            $('#response').html('Error')
        }

    });


    var winh = document.body.scrollHeight;
    var sideh = document.getElementById('side').scrollHeight;
    var opx = winh - sideh;
    document.getElementById('rough').style.height = opx + "px";
    $('body').on('click', '.menu-toggle', function () {


        var opx2 = winh - sideh + 180;
        document.getElementById('rough').style.height = opx2 + "px";
    });
</script>
</body>
</html>
