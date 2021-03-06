<!doctype html>
<?php 
if ($servicios['television']!==no){
		$producto = $this->db->get_where('products',array('pid'=>27))->row();
		$totaltv = $producto->product_price+3992;
	
}if ($servicios['combo']!==no){
	
					$producto2 = $this->db->get_where('products',array('product_name'=>$servicios['combo']))->row();
                    $x1=strtolower($servicios['combo']);
                    $x1=str_replace(" ","", $x1);

                    $producto2 = $this->db->query("SELECT * FROM products where LOWER(REPLACE(product_name,' ',''))='".$x1."'")->result_array();                    
					$inter = $producto2[0]['product_price'];
}
$equipo = $this->db->get_where('equipos',array('asignado'=>$details['abonado']))->row();
$serial = $equipo->serial;
$fcontrato = $details['f_contrato'];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contrato # <?php echo $details['documento'] ?></title>
    <style>	
        body {
            color: #2B2000;
			font-family: 'Helvetica';						
        }
        .invoice-box {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 4mm;
            border: 0;
            font-size: 12pt;
            line-height: 14pt;
            color: #000;
        }

        table {
            width: 100%;
            line-height: 16pt;
            text-align: left;
			border-collapse: collapse;
        }

        .plist tr td {
            line-height: 12pt;
        }

        .subtotal tr td {
            line-height: 10pt;
		    padding: 6pt;
        }

		.subtotal tr td {          
			border: 1px solid #ddd;
        }

        .sign {
            text-align: right;
            font-size: 10pt;
            margin-right: 110pt;
        }

        .sign1 {
            text-align: right;
            font-size: 10pt;
            margin-right: 90pt;
        }

        .sign2 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .sign3 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .terms {
            font-size: 9pt;
            line-height: 16pt;
			margin-right:20pt;
        }

        .invoice-box table td {
            padding: 10pt 4pt 8pt 4pt;
            vertical-align: top;

        }

		.invoice-box table.top_sum td {
            padding: 0;
			font-size: 12pt;
        }

        .party tr td:nth-child(3) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20pt;

        }

        table tr.top table td.title {
            font-size: 45pt;
            line-height: 45pt;
            color: #555;
        }

        table tr.information table td {
            padding-bottom: 20pt;
        }

        table tr.heading td {
            background: #515151;
            color: #FFF;
            padding: 6pt;

        }

       table tr.details td {
            padding-bottom: 20pt;
        }

		   .invoice-box table tr.item td{
            border: 1px solid #ddd;
        }

        table tr.b_class td{
            border-bottom: 1px solid #ddd;
        }

       table tr.b_class.last td{
            border-bottom: none;
        }

        table tr.total td:nth-child(4) {
            border-top: 2px solid #fff;
            font-weight: bold;
        }

        .myco {
            width: 50%;
        }

        .myco2 {
            width: 50%;
        }
		.end1 {
			text-align: right;
		}

        .myw {
            width: 50%;
            font-size: 14pt;
            line-height: 14pt;
			
        }

        .mfill {
            background-color: #eee;
        }

		 .descr {
            font-size: 10pt;
            color: #515151;
        }

        .tax {
            font-size: 10px;
            color: #515151;
        }

        .t_center {
            text-align: right;

        }
		.party {
		border: #ccc 1px solid;
		}
		.cla {
			text-align: center;
			font-weight: bold;
		}
		
   
     
    </style>
</head>

<body>

<div class="invoice-box">
	<table width="100%">
  <tbody>
    <tr>
      <td style="width: 24%"><img src="<?php echo FCPATH . 'userfiles/company/' . $this->config->item('logo') ?>" style="max-width:20%;"></td>
      <td class="end1" style="width: 25%"><h2>CONTRATO ??NICO DE <br>SERVICIOS FIJOS </h2>No. <span style="border-bottom: 1px solid;"><?php echo $details['documento'] ?></span></td>
		<td rowspan="8" style="width: 2%"></td>
      <td colspan="2" rowspan="3" style="width: 48%; text-align: justify;">
		  
		 <h4>TERMINACI??N</h4>
		Usted puede terminar el contrato en cualquier momento sin penalidades. Para esto debe
		realizar una solicitud a trav??s de cualquiera de nuestros Medios de Atenci??n m??nimo 3 d??as
		h??biles antes del corte de facturaci??n (su corte de facturaci??n es el d??a 21 de cada mes). Si
		presenta la solicitud con una anticipaci??n menor, la terminaci??n del servicio se dar?? en el
		siguiente periodo de facturaci??n.
		As?? mismo, usted puede cancelar cualquiera de los servicios contratados, para lo que le
		informaremos las condiciones en las que ser??n prestados los servicios no cancelados y
		actualizaremos el contrato. As?? mismo, si el operador no inicia la prestaci??n del servicio en el
		plazo acordado, usted puede pedir la restituci??n de su dinero y la terminaci??n del contrato.
		<H4>PAGO Y FACTURACI??N</H4>
		La factura le debe llegar como m??nimo 5 d??as h??biles antes de la fecha de pago. Si no llega,
		puede solicitarla a trav??s de nuestros Medios de Atenci??n y debe pagarla oportunamente.
		Si no paga a tiempo, previo aviso, suspenderemos su servicio hasta que pague sus saldos
		pendientes. Contamos con 3 d??as h??biles luego de su pago para reconectarle el servicio. Si no
		paga a tiempo, tambi??n podemos reportar su deuda a las centrales de riesgo. Para esto
		tenemos que avisarle por lo menos con 20 d??as calendario de anticipaci??n.
		Si paga luego de este reporte, tenemos la obligaci??n dentro del mes de seguimiento de
		informar su pago para que ya no aparezca reportado. Si tiene un reclamo sobre su factura,
		puede presentarlo antes de la fecha de pago y en ese caso no debe pagar las sumas reclamadas
		hasta que resolvamos su solicitud. Si ya pag??, tiene 6 meses para presentar la reclamaci??n.
		</td>
      
    </tr>
    <tr>
		
      <td style="width: 15%"><img src="<?php echo FCPATH . 'userfiles/company/qr_vestel.png'?>" style="float: left"></img></td>
      <td align="left" style="width: 30%"><br><br><br><br><h1>Poner nombre del edificio</h1></td>
      
    </tr>
    <tr>
      <td colspan="2" style="background-color: black;color: white; font-size: x-large;text-align: justify">
		  	Este contrato explica las condiciones para la prestaci??n
			de los servicios entre usted, Vesga Telecomunicaciones y Vesga Television (VESTEL S.A.S), por el que pagar?? m??nimo
			mensualmente <span style="border-bottom: 1px solid;border-bottom-color: white"><?php echo amountFormat($totaltv+$inter) ?></span>. Este contrato
		  tendr?? vigencia de <span style="border-bottom: 1px solid;border-bottom-color: white">12</span> meses, contados a partir
			del <span style="border-bottom: 1px solid;border-bottom-color: white"><?php echo date("d/m/Y",strtotime($fcontrato)) ?></span>. El plazo m??ximo de instalaci??n
			es de 15 d??as h??biles. Acepto que mi contrato se
			renueve sucesivamente y autom??ticamente por un plazo
			igual a la inicial.
		</td>
      
      
    </tr>
    <tr>
      <td colspan="2" style="text-align: justify">
		  <h4>EL SERVICIO</h4>
			Con este contrato nos comprometemos a prestarle los servicios que usted elija*:
			Internet fijo Televisi??n Servicios adicionales <span style="border-bottom: 1px solid;"><?php if ($servicios['television']!==no){ echo $servicios['television'];} if ($servicios['combo']!==no){ echo ' + '.$servicios['combo'];}if ($servicios['puntos']!=='0'){ echo ' + '.$servicios['puntos'].' Puntos';} ?></span>
			
			Usted se compromete a pagar oportunamente el precio acordado. El servicio se activar?? a
			m??s tardar el d??a <span style="border-bottom: 1px solid;"><?php echo date("d/m/Y",strtotime($fcontrato."+ 15 days")) ?></span>			
			
		</td>
      
      <td colspan="2">
		  <table width="100%" border="1">
  <tbody>
    <tr>
      <td align="center"><img height="130px" src="<?=base_url()?>assets/firmas_digitales/<?=$id?>.png"></img><img height="130px" src="<?=base_url()?>assets/huellas_digitales/Huella_CUS_<?=$id?>.png"></img><br>Con esta firma acepta recibir la factura solo por medios electr??nicos</td>
    </tr>
  </tbody>
</table>

		
		</td>
      
    </tr>
    <tr>
      <td colspan="2">
		  <table width="100%" border="1">
  <tbody>
    <tr style="border-radius: 20px">
      <td style="font-size: x-large">
		<h4>INFORMACI??N DEL SUSCRIPTOR</h4><br>
		Contrato No.: <span style="border-bottom: 1px solid;"><?php echo $details['documento'] ?></span><br><br>
		Nombre/Raz??n Social: <span style="border-bottom: 1px solid;"> <?php echo $details['name'].' '.$details['dosnombre'].' '.$details['unoapellido'].' '.$details['dosapellido'] ?></span><br><br>
		  Identificaci??n: <span style="border-bottom: 1px solid;"><?php echo $details['tipo_documento'].' '.$details['documento'] ?></span><br><br>
		Correo electr??nico: <span style="border-bottom: 1px solid;"><?php echo $details['email'] ?></span><br><br>
		Tel??fono de contacto: <span style="border-bottom: 1px solid;"><?php echo $details['celular'] ?></span><br><br>
		Direcci??n de servicio: <span style="border-bottom: 1px solid;"><?php echo $details['barrio'] ?></span> Estrato: <span style="border-bottom: 1px solid;"><?php echo $details['estrato'] ?></span><br><br>
		Departamento: <span style="border-bottom: 1px solid;"><?php echo $details['departamento'] ?></span> Municipio: <span style="border-bottom: 1px solid;"><?php echo $details['ciudad'] ?></span><br><br>
		Direcci??n suscriptor: <span style="border-bottom: 1px solid;"><?php echo $details['nomenclatura'].' '.$details['numero1'].$details['adicionauno'].' # '.$details['numero2'].$details['adicional2'].' - '.$details['numero3'] ?></span>
		</td>
    </tr>
    <tr>
      <td style="border: 0,0,0,0"></td>
    </tr>
  </tbody>
</table>
	<h4>EQUIPO EN COMODATO:</h4> El equipo Router serial N <span style="border-bottom: 1px solid;"><?php echo $serial ?></span>, suministrado durante la instalacion del servicio es en calidad de COMODATO y debe ser devuelto a la terminacion del contrato en perfecto estado, excepto por da??os t??cnicos propios del equipo o ser?? cargado a su cuenta a un costo de <span style="border-bottom: 1px solid;"><?php echo amountFormat(245000)?></span>
		
		</td>
      
      <td colspan="2" style="text-align: justify">
		<h4>COMO COMUNICARSE CON NOSOTROS (MEDIOS DE ATENCI??N)</h4>
		1. Nuestros medios de atenci??n son: oficinas f??sicas, p??gina web, redes sociales y l??neas
		telef??nicas gratuitas.<br>
		2. Presente cualquier queja, petici??n/reclamo o recurso a trav??s de estos medios y le
		responderemos en m??ximo 15 d??as h??biles.<br>
		3. Si no respondemos es porque aceptamos su petici??n o reclamo. Esto se llama silencio
		administrativo positivo y aplica para internet.<br>
		<h6>Si no est?? de acuerdo con nuestra respuesta</h6>
		4. Cuando su queja o petici??n sea por los servicios de internet, y est?? relacionada
		con actos de negativa del contrato, suspensi??n del servicio, terminaci??n del contrato, corte y
		facturaci??n; usted puede insistir en su solicitud ante nosotros, dentro de los 10 d??as h??biles
		siguientes a la respuesta, y pedir que si no llegamos a una soluci??n satisfactoria para usted,
		enviemos su reclamo directamente a la SIC (Superintendencia de Industria y Comercio) quien
		resolver?? de manera definitiva su solicitud. Esto se llama recurso de reposici??n y en subsidio
		apelaci??n.
		Cuando su queja o petici??n sea por el servicio de televisi??n, puede enviar la misma a la
		Autoridad Nacional de Televisi??n, para que esta Entidad resuelva su solicitud.
		<h6>CAMBIO DE DOMICILIO</h6>
		Usted puede cambiar de domicilio y continuar con el servicio siempre que sea t??cnicamente
		posible. Si desde el punto de vista t??cnico no es viable el traslado del servicio, usted puede
		ceder su contrato a un tercero o terminarlo pagando el valor de la cl??usula de permanencia
		m??nima si est?? vigente.
		<h6>COBRO POR RECONEXI??N DEL SERVICIO</h6>
		En caso de suspensi??n del servicio por mora en el pago, podremos cobrarle un valor por
		reconexi??n que corresponder?? estrictamente a los costos asociados a la operaci??n de
		reconexi??n. En caso de servicios empaquetados procede m??ximo un cobro de reconexi??n por
		cada tipo de conexi??n empleado en la prestaci??n de los servicios. Costo reconexi??n por servicio es de <span style="border-bottom: 1px solid;"><?php echo amountFormat(12000)?></span>
		</td>
      
    </tr>
    <tr>
      <td colspan="2" style="text-align: justify">
		<h4>ACEPTO CLAUSULA DE PERMANENCIA M??NIMA</h4>
		En consideraci??n a que le estamos otorgando un descuento respecto del valor del cargo por
		conexi??n, o le diferimos el pago del mismo, se incluye la presente cl??usula de permanencia
		m??nima. En la factura encontrar?? el valor a pagar si decide terminar el contrato
		anticipadamente.
		</td>
      
      <td colspan="2" style="background-color: black; color: white; font-size: x-large; text-align: justify">
		El usuario es el ??NICO responsable por el contenido y la informaci??n
		que se curse a trav??s de la red y del uso que se haga de los equipos o de
		los servicios.
		Los equipos de comunicaciones que ya no use son desechos que no
		deben ser botados a la caneca,
		</td>
      
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="1">
  <tbody>
    <tr>
      <td colspan="6" class="cla">
		<h4>COSTO INSTALACI??N</h4>
		</td>
    </tr>
    <tr>
      <td colspan="4">VALOR TOTAL DEL CARGO POR CONEXI??N</td>
      <td colspan="2"><?php echo amountFormat(306000)?></td>
    </tr>
    <tr>
      <td colspan="4">Suma que le fue diferida del valor total del cargo por conexi??n</td>
      <td colspan="2"><?php echo amountFormat(50000)?></td>
    </tr>
    <tr>
      <td colspan="4">Fecha inicio permanencia m??nima</td>
      <td colspan="2"><?php echo date("d/m/Y",strtotime($fcontrato)) ?></td>
    </tr>
    <tr>
      <td colspan="4">Fecha de finalizaci??n de la permanencia m??nima</td>
      <td colspan="2"><?php echo date("d/m/Y",strtotime($fcontrato."+ 1 year")) ?></td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: center;font-weight: bold">Valor a pagar si termina el contrato anticipadamente seg??n el mes</td>
    </tr>
    <tr>
      <td class="cla">Mes 1</td>
      <td class="cla">Mes 2</td>
      <td class="cla">Mes 3</td>
      <td class="cla">Mes 4</td>
      <td class="cla">Mes 5</td>
      <td class="cla">Mes 6</td>
    </tr>
    <tr>
      <td class="cla"><?php echo amountFormat(256000)?></td>
      <td class="cla"><?php echo amountFormat(234667)?></td>
      <td class="cla"><?php echo amountFormat(213334)?></td>
      <td class="cla"><?php echo amountFormat(192001)?></td>
      <td class="cla"><?php echo amountFormat(170668)?></td>
      <td class="cla"><?php echo amountFormat(149335)?></td>
    </tr>
    <tr>
      <td class="cla">Mes 7</td>
      <td class="cla">Mes 8</td>
      <td class="cla">Mes 9</td>
      <td class="cla">Mes 10</td>
      <td class="cla">Mes 11</td>
      <td class="cla">Mes 12</td>
    </tr>
	 <tr>
      <td class="cla"><?php echo amountFormat(128002)?></td>
      <td class="cla"><?php echo amountFormat(106669)?></td>
      <td class="cla"><?php echo amountFormat(85336)?></td>
      <td class="cla"><?php echo amountFormat(64003)?></td>
      <td class="cla"><?php echo amountFormat(42670)?></td>
      <td class="cla"><?php echo amountFormat(21337)?></td>
    </tr>
  </tbody>
</table>

</td>
      
      <td colspan="2" style="text-align: justify">
		<h6>PRECIO DEL SERVICIO Y FORMA DE PAGO:</h6> El suscriptor se obliga a pagar mensualidades
		por el valor contratado. El precio a pagar no incluye en suma alguna por el pago de los
		derechos de autor por ejecuci??n p??blica. Por lo tanto VESTEL S.A.S. no ser?? responsable por el
		pago de los derechos de autor que se causen por ejecuci??n p??blica de obras protegidas. VESTEL
		S.A.S. podr?? incrementar el valor del servicio en cualquier momento, caso en el que
		comunicar?? a EL SUSCRIPTOR el valor de dicho incremento previa a su aplicaci??n y la fecha a
		partir de la cual se le aplicar?? el reajuste, Las tarifas de los planes de internet se incrementar??n
		en un porcentaje m??ximo anual que no supere el 60% del valor tarifa al momento del reajuste
		tarifario, quedando a elecci??n de VESTEL S.A.S. el ??ndice de reajuste que utilizar?? y la
		periodicidad de la misma. Todo esto conforme con el registro de tarifas ante la Entidad
		competente si por ley o reglamento es necesario.
		<h6>CONDICIONES DEL SERVICIO:</h6> La oferta del servicio para internet es no caracterizada, por lo
		tanto, VESTEL S.A.S. se obliga a garantizar hasta la velocidad seleccionada en la portada del
		presente contrato, sin estar en obligaci??n de mantenerla en oferta continua. Acepto y declaro
		conocer las condiciones contractuales que me han sido informadas con o sin cl??usula de
		permanencia, las cuales puedo consultar en www.vestel.com.co la p??gina web del
		concesionario.
		</td>
      
    </tr>
	<tr>
      <td colspan="2">
		<h4>PRINCIPALES OBLIGACIONES DEL USUARIO</h4>
		1) Pagar oportunamente los servicios prestados, incluyendo los intereses de mora cuando haya
		incumplimiento;<br>
		2) Suministrar informaci??n verdadera;<br>
		3) Hacer uso adecuado de los equipos y los servicios;<br>
		4) No divulgar ni acceder a pornograf??a;
		
		
		
		</td>
      
      <td colspan="2">
		  <table width="100%" border="1">
  <tbody>
    
    <tr>
      <td valign="bottom" align="center"><img height="130px" src="<?=base_url()?>assets/firmas_digitales/<?=$id?>.png"><img height="130px" src="<?=base_url()?>assets/huellas_digitales/Huella_CUS_<?=$id?>.png"></img><br>Aceptaci??n contrato mediante firma o cualquier otro medio v??lido</td>
    </tr>
  </tbody>
</table>

		
		</td>
      
    </tr>
	<tr>
      <td colspan="2" style="text-align: justify">
		  <h4>CALIDAD Y COMPENSACI??N</h4>
		Cuando se presente indisponibilidad del servicio o este se suspenda a pesar de su pago
		oportuno, lo compensaremos en su pr??xima factura. Debemos cumplir con las condiciones de
		calidad definidas por la CRC. Cons??ltelas en la p??gina: www.operador.com/indicadores de
		calidad
		  <h4>CESI??N</h4>
		Si quiere ceder este contrato a otra persona, debe presentar una solicitud por escrito a trav??s
		de nuestros Medios de Atenci??n, acompa??ada de la aceptaci??n por escrito de la persona a la
		que se har?? la cesi??n. Dentro de los 15 d??as h??biles siguientes, analizaremos su solicitud y le
		daremos una respuesta. Si se acepta la cesi??n queda liberado de cualquier responsabilidad con
		nosotros.
		<h4>MODIFICACI??N</h4>
		Nosotros no podemos modificar el contrato sin su autorizaci??n. Esto incluye que no podemos
		cobrarle servicios que no haya aceptado expresamente. Si esto ocurre tiene derecho a terminar
		el contrato, incluso estando vigente la cl??usula de permanencia m??nima, sin la obligaci??n de
		pagar suma alguna por este concepto. No obstante, usted puede en cualquier momento
		modificar los servicios contratados. Dicha modificaci??n se har?? efectiva en el per??odo de
		facturaci??n siguiente, para lo cual deber?? presentar la solicitud de modificaci??n por lo menos
		con 3 d??as h??biles de anterioridad al corte de facturaci??n.
		<h4>SUSPENSI??N</h4>
		Usted tiene derecho a solicitar la suspensi??n del servicio por un m??ximo de 2 meses al a??o.
		Para esto debe presentar la solicitud antes del inicio del ciclo de facturaci??n que desea
		suspender. Si existe una cl??usula de permanencia m??nima, su vigencia se prorrogar?? por el
		tiempo que dure la suspensi??n.
		<h6>ANEXO AL CONTRATO DE SUSCRIPCI??N A LOS SERVICIOS DE INTERNET DE VESTEL S.A.S.</h6>
		<h6>AUTORIZACI??N REPORTE CENTRALES DE RIESGOS:</h6> Declaro bajo juramento que la informaci??n
		que he suministrado es ver??dica y con consentimiento expreso e irrevocable a VESTEL S.A.S. o
		quien sea en el futuro el acreedor del cr??dito solicitado, para: a) Consultar o confirmar en
		cualquier tiempo, en las centrales de riesgo, entidades financieras, autoridades competentes, y
		con particulares toda la informaci??n relevante para conocer mi desempe??o como deudor,
		referencias, mi capacidad de pago o para valorar el riesgo futuro de concederme un
		cr??dito.______ b) Reportar a las centrales de informaci??n de riesgos datos, tratados o sin
		tratar, tanto sobre el cumplimiento oportuno como sobre el incumplimiento, si lo hubiere, de
		mis obligaciones crediticias, o de mis deberes legales de contenido patrimonial, de tal forma
		que ??stas presenten una informaci??n veraz, pertinente, completa actualizada y exacta de mi
		desempe??o como deudor, despu??s de haber cruzado y procesado diversos datos ??tiles para
		obtener una informaci??n significativa.____ c) Enviar la informaci??n mencionada a las centrales
		de riesgo de manera directa y tambi??n, por intermedio de la Superintendencia Financiera o las
		dem??s entidades p??blicas que ejercen funciones de vigilancia y control, con el fin de que ??stas
		puedan tratarla, analizarla, clasificarla y luego suministrarla a dichas centrales. ____ d)
		Conservar, tanto en VESTEL S.A.S. como en las centrales de riesgo, con las debidas
		actualizaciones y durante el per??odo necesario se??alado en sus reglamentos la informaci??n
		indicada en los literales b) y e) de esta cl??usula.___ e) Suministrar a las centrales de
		informaci??n de riesgo datos relativos a mis solicitudes de cr??dito as?? como otros atinentes a mis
		relaciones comerciales, financieras y en general socioecon??micas que yo haya entregado o que
		consten en registros p??blicos, bases de datos p??blicas o documentos p??blicos. _____ f)
		Reportar a las autoridades tributarias, aduaneras o judiciales la informaci??n que requieran para
		cumplir sus funciones de controlar y velar el acatamiento de mis deberes constitucionales y
		legales.
		<h6>AUTORIZACI??N SOBRE TRATAMIENTO DE DATOS PERSONALES:</h6> Autorizo a VESTEL S.A.S. para
		recolectar, almacenar, depurar, usar, analizar, circular, actualizar, transferir intencionalmente y
		cruzar con informaci??n propia o de terceros, mis datos personales con la finalidad de: realizar,
		a trav??s de cualquier medio incluyendo mensajer??a instant??nea, en forma directa o a trav??s de
		terceros, actividades de mercadeo, promoci??n y/o publicidad propia o de terceros, venta,
		facturaci??n, gesti??n de cobranza, recaudo, programaci??n, soporte t??cnico, inteligencia de
		mercados, mejoramiento del servicio, verificaciones y consultas, control, comportamiento,
		h??bito y habilitaci??n de medios de pago, prevenci??n de fraude, as?? como cualquier otro
		relacionado con sus productos y servicios, actuales y futuros, para el cumplimiento de las
		obligaciones contractuales y de su objeto social; generar una comunicaci??n ??ptima en relaci??n
		con sus servicios, productos, promociones, programaci??n, estrenos, destacados, facturaci??n y
		dem??s actividades; evaluar la calidad de sus productos y servicios y realizar estudios sobre
		h??bitos de consumo, preferencia, inter??s de compra, prueba de producto, concepto,
		evaluaci??n del servicio, satisfacci??n y otras relacionadas con sus servicios y productos; prestar
		asistencia, servicio y soporte t??cnico de sus productos y servicios; realizar las gestiones
		necesarias para dar cumplimiento a las obligaciones inherentes a los servicios y productos
		contratados con VESTEL S.A.S.; cumplir con las obligaciones contra??das con sus clientes,
		suscriptores, usuarios, proveedores, aliados, sus filiales, distribuidores, subcontratistas,
		autsourcing y dem??s terceros p??blicos y/o privados, relacionados directa o indirectamente con
		el objeto social de VESTEL S.A.S.; informar sobre cambios de productos y servicios relacionados
		con el giro ordinario de los negocios de VESTEL S.A.S., controlar y prevenir el fraude en todas
		sus modalidades; facilitar la correcta ejecuci??n de las compras y prestaciones de los servicios y
		productos contratados. En todo caso el tratamiento de mis datos personales debe estar sujeto
		a la protecci??n establecidas en la Ley 1581 de 2012, sus decretos reglamentarios y las normas
		que los modifiquen as?? como a la Pol??tica de Datos Personales establecida en el Manual interno
		de tratamiento de datos personales de VESTEL S.A.S., que se encuentra disponible en
		www.vestel.com.co enlace donde va a quedar disponible. En cualquier momento podr??
		ejercer los derechos establecidos en estas normas y particularmente modificar y/o revocar la
		autorizaci??n prestada o solicitar la supresi??n parcial o definitiva de mis datos personales. Las
		solicitudes de supresi??n y/o revocaci??n de la autorizaci??n de datos personales no proceden
		cuando EL SUSCRIPTOR tenga un deber legal o contractual de permanecer en las bases de datos
		de VESTEL S.A.S. de conformidad con lo establecido en las normas aplicables.
		<h6>ADMINISTRACI??N DE RIESGO DE LAVADO DE ACTIVOS Y FINANCIACI??N DEL TERRORISMO:</h6>
		EL SUSCRIPTOR declara de manera voluntaria y dando certeza de que lo aqu?? consignado es
		informaci??n veraz y verificable, lo siguiente: __ (i) que los recursos utilizados para la ejecuci??n
		del siguiente contrato, al igual que sus ingresos, no provienen de ninguna actividad il??cita
		previstas en el C??digo Penal Colombiano, las normas que lo modifiquen o adicionen, ni ser??n
		utilizados para efectos de financiar actividades terroristas o cualquier otra conducta delictiva
		de acuerdo con las normas penales vigentes en Colombia. __ (ii) que el suscriptor, sus socios o
		administradores (Cuando aplique, no ha sido incluido en listas de control de riesgo de lavado
		de activos y financiaci??n al terrorismo nacionales o internacionales vinculantes para Colombia y
		definidas por VESTEL S.A.S., de acuerdo con su sistema de Autocontrol y gesti??n de riesgo y
		lavado de activos y financiaci??n del terrorismo SAGRLAFT, entre las que se encuentran la lista
		de la Oficina de Control de Activos en el exterior OFAC, emitida por el por la Oficina del Tesoro
		de los Estados Unidos de Norteam??rica y la lista de sanciones del Consejo de Seguridad de la
		Organizaci??n de Naciones Unidas: __ (iii) que no incurre en sus actividades en ninguna
		actividad il??cita de las contempladas en el C??digo Penal Colombiano o en cualquier otra norma
		que lo modifique o adicione. EL SUSCRIPTOR se obliga con VESTEL S.A.S., a entregar
		informaci??n veraz y verificable y a actualizar su informaci??n institucional, comercial y financiera
		por lo menos una vez al a??o, o cada vez que as?? lo solicite la entidad, suministrando la totalidad
		de los soportes documentales exigidos. 
		
		</td>
      <td></td>
      <td colspan="2" style="text-align: justify">
		  El incumplimiento de esta obligaci??n faculta a VESTEL
		S.A.S., para terminar de manera inmediata y unilateral cualquier tipo de relaci??n que tenga con
		EL SUSCRIPTOR. EL SUSCRIPTOR autoriza a VESTEL S.A.S., a realizar consultas a trav??s de
		cualquier medio, por s?? mismo o a trav??s de un proveedor, para efectuar las verificaciones
		necesarias para corroborar la informaci??n aqu?? consignada.
		  <h6>PROHIBICIONES Y DEBERES PARA PREVENIR EL ACCESO A MENORES DE EDAD A
		INFORMACI??N PORNOGR??FICA Y A IMPEDIR EL APROVECHAMIENTO DE REDES GLOBALES DE
		INFORMACI??N CON FINES DE EXPLOTACI??N SEXUAL INFANTIL U OFRECIMIENTO DE
		SERVICIOS COMERCIALES QUE IMPLIQUEN ABUSO SEXUAL CON MENORES DE EDAD:</h6>
		EL SUSCRIPTOR declara expresamente que conoce y acata las normas legales que se??alan las
		prohibiciones y deberes para prevenir el acceso de menores de edad a cualquier modalidad de
		informaci??n pornogr??fica y a impedir el aprovechamiento de redes globales de informaci??n con
		fines de explotaci??n sexual infantil u ofrecimiento de servicios comerciales que impliquen
		abuso sexual con menores de edad particularmente las se??aladas en la Ley 679 de Agosto 3 de
		2001, Ley 1336 de 2009, Decreto 1524 de 2002, C??digo Penal y dem??s normas que los
		modifiquen, sustituyan o adicionen. La inobservancia de estas diposiciones acarrear?? las
		sanciones administrativas y penales contempladas en la Ley 679 de 2001 y en el Decreto 1524
		de 2002, EL SUSCRIPTOR se compromete a cumplir con las siguientes obligaciones contenidas
		en el Art??culo 4 y Art??culo 5 del citado Decreto: Art??culo 4??. Prohibiciones. Los proveedores o
		servidores, administradores y usuarios de redes globales de informaci??n no podr??n: __ 1.
		Alojar en su propio sitio im??genes, textos, documentos o archivos audiovisuales que impliquen
		directa o indirectamente actividades sexuales con menores de edad. __ 2. Alojar en su propio
		sitio material pornogr??fico, en especial en modo de im??genes o videos, cuando existan indicios
		de que las personas fotografiadas o filmadas son menores de edad. __ 3. Alojar en su propio
		sitio v??nculos o "links", sobre sitios telem??ticos que contengan o distribuyan material
		pornogr??fico relativo a menores de edad. Art??culo 5??. Deberes. Sin perjuicio de las obligaciones
		de denuncia consagrada en la ley para todos los residentes en Colombia, los proveedores,
		administradores y usuarios de redes globales de informaci??n deber??n: __ 1. Denunciar ante las
		autoridades competentes cualquier acto criminal contra menores de edad que tengan
		conocimiento, incluso de la difusi??n de material pornogr??fico asociado a menores. __
		2. Combatir con todos los medios t??cnicos a su alcance la difusi??n de material pornogr??fico con
		menores de edad. ___ 3. Abstenerse de usar las redes globales de informaci??n para divulgaci??n
		de material ilegal con menores de edad. __ 4. Establecer mecanismos t??cnicos de bloqueo por
		medio de los cuales los usuarios se puedan proteger a s?? mismos o a sus hijos de material ilegal,
		ofensivo o indeseable en relaci??n con menores de edad. DUBER BORRAR
		</td>
      
    </tr>
  </tbody>
</table>

    
	</div>
    
</body>
</html>