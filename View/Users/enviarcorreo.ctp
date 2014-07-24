<?php App::uses('CakeEmail', 'Network/Email');?>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">	

	<tr>
		<td><p>La información del usuario <?php echo $userupd?> ha sido enviado al 
		correo que registro en la inscripción.</p></td>			
		<?php echo $this->Html->link(__(''), array('controller' => 'users','action' => 'updateuserlogin',$userupd)); ?>			
	</tr>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
	</ul>
</div>
