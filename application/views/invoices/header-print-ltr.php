<table>
        <tr>
            
            <td>

            </td>
            <td class="myw">
			<table class="top_sum">
                 <tr>
                       <td colspan="1" class="t_center"><h2 ><?php echo $this->config->item('ctitle') ?></h2><br></td>
                    </tr>
			<tr>
            <td class="t_center"><?php echo $this->config->item('address') ?></td>
			</tr>
		    <!--<tr>
            <td class="t_center">Nit: <?php echo $this->config->item('postbox') ?></td>
			</tr>-->
			<!--<tr>
            <td class="t_center"><?php //echo $this->config->item('phone') ?></td>
			</tr> -->
			<?php if($invoice['refer']) { ?>
			<!--<tr>
            <td class="t_center"><?php echo $this->lang->line('') .'Sede: '. $invoice['refer'] ?></td>
			</tr>-->
			
				
			<?php $fecha=date("m/d/Y").' '.date("g:i a"); 
			if(isset($transaccion)){
				$fecha=$transaccion->date;
			}
			?>
           
          

			<tr>
				<td class="t_center"><?php echo $fecha ?></td>
			</tr>
			<?php } ?>
			</table>



            </td>
        </tr>
    </table><br>