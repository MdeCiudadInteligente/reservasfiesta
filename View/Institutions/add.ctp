<script type="text/javascript">
<?php $this->set('title_for_layout' , 'Agregar grupo' );?>
function goBack()
  {
  		window.history.back()
  }
</script>
<script type="text/javascript">
 function validarEmail(valor) {
	 var filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
  } else {
   alert("La dirección de correo es incorrecta.");
   document.getElementById("InscriptionRepresentativeMail").focus();
   return false;
  }
  return true;
}
 </script> 
 <script type="text/javascript">
 function validarCorreo(valor) {
	 var filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
  } else {
   alert("La dirección de correo es incorrecta.");
   document.getElementById("InscriptionContanctMail").focus();
   return false;
  }
  return true;
}
 </script> 
<script type="text/javascript">
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
</script>
<!--  función para los select quemados...-->
<script type="text/javascript">
function checkSubmit()
{
	var objfrm = document;
    if(objfrm.getElementById("InstitutionComune").selectedIndex == 0) 
    {
	    document.getElementById("InstitutionComune").focus();	
	    alert('Por favor elija la comuna donde vive');
	    return false;
     }
     else
     {
        return true;
     }
}
</script>
<div class="institutions form">
<?php echo $this->Form->create('Institution',array('onsubmit'=>'return checkSubmit()')); ?>
	<fieldset>
	<span>Al diligenciar este formulario  recibirás un</span><span> usuario y una contraseña que te permitirá administrar y modificar la información de tu grupo.  Te pedimos que ingreses los datos completos de tu entidad o institución educativa. Por favor ingresa el nombre exacto.  Ejemplo: Institución Educativa Benedikta Zur Nieden – Fundación Taller de Letras Jordi Sierra i Fabra.</span>
	</br></br></br>
		<legend><?php //echo __('Add Institution'); ?></legend>
	<?php
		//echo $this->Form->input('id_institution',array('type'=>'text'));
		echo $this->Form->input('name',array('label'=>'Nombre Grupo','maxLength'=>'256'));
		echo $this->Form->input('mail',array('label'=>'Correo Grupo','maxLength'=>'80','type'=>'email','onchange'=>'validarEmail(this.value)'));
		echo $this->Form->input('address',array('label'=>'Dirección Grupo','maxLength'=>'80'));
		echo $this->Form->input('phone',array('label'=>'Teléfono Grupo','maxLength'=>'10','onkeypress'=>'return isNumberKey(event)'));
		echo $this->Form->input('city',array ('id' => 'city','type'=>'select','options' => array ('Medellin'=>'Medellin','Otras'=>'Otra ciudad o municipio'),'label'=>'Ciudad Grupo','empty'=>'Seleccione ciudad del grupo'));
				
	?>
		<div id="hola" class="input select required">
		<?php 
			echo $this->Form->input('comune',array('type'=>'hidden','label'=>'Comuna Grupo'));
			echo $this->Form->input('neighborhood',array('type'=>'hidden','label'=>'Barrio Grupo'));
		
		?>
		</div>	
		<br><br>
			
		<?php echo $this->Form->input('inst_type',array ('id' => 'inst_type_id','type'=>'select','options' => array ('Institucion Educativa'=>'Institucion Educativa','Institucion Independiente'=>'Institucion Independiente'),'label'=>'Tipo de Grupo','empty'=>'Seleccione tipo de grupo'));?>
		<div id="hola2" class="input select required">
				<?php 
					echo $this->Form->input('educational_inst_type',array('type'=>'hidden','label'=>'Tipo Institución educativa'));
					echo $this->Form->input('code_education',array('type'=>'hidden','label'=>'Código DANE'));		
				?>
		</div>
			
		 <!--  <input name="data[Institution][workshop_session_id]" value="1" id="WorkshopSessionId" type="hidden"/>-->
	    <?php 
		//echo $this->Form->input('workshop_session_id');

		//echo $this->Form->input('SpecificCondition');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Continuar')); ?>
</div>
<?php
$usuario_level= $this->Session->read('Auth.User.permission_level');	
if ($usuario_level == '1'){?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('action' => 'index')); ?></li>		
		<li><?php echo $this->Html->link(__('New Workshop Session'), array('controller' => 'workshop_sessions', 'action' => 'add')); ?> </li>		
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
<?php }?>
<?php

/*
$this->Js->get('#city');
$this->Js->event('change', $this->Js->alert('hey you!'));
*/

$this->Js->get('#city')->event('change', 
	$this->Js->request(array(
		'controller'=>'institutions',
		'action'=>'getbycity'
		), array(
		'update'=>'#hola',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);

$this->Js->get('#inst_type_id')->event('change',
		$this->Js->request(array(
				'controller'=>'institutions',
				'action'=>'getbytype'
		), array(
				'update'=>'#hola2',
				'async' => true,
				'method' => 'post',
				'dataExpression'=>true,
				'data'=> $this->Js->serializeForm(array(
						'isForm' => true,
						'inline' => true
				))
		))
);


?>
