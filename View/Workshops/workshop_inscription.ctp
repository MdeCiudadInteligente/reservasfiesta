<?php $this->set('title_for_layout' , 'Ver horarios' );?>
<div class="workshops view">
<?php echo $this->Form->create('Workshop'); ?>
<h2><?php echo __('Workshop'); ?></h2>
<span>Si este taller es de tu agrado, haz click en hacer inscripción. Si quieres más opciones por favor vuelve atrás.</span>
</br></br>
	<dl>
		<!--  <dt><?php //echo __('Id Workshop'); ?></dt>-->
		<dd>
			<?php //echo h($taller['Workshop']['id_workshop']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($taller['Workshop']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($taller['Workshop']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entity'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taller['Entity']['name'], array('controller' => 'entities', 'action' => 'view', $taller['Entity']['id_entity'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Día del taller'); ?></dt>
		<dd>
			<?php echo $this->Time->format($tallerdayp, '%B %e, %Y'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora del taller'); ?></dt>
		<dd>
			<?php //echo $this->Form->input('horataller',array ('options' => array ($tallertimen)));?>
			<?php echo '<label><select name="data[Workshop][horataller]">'.$tallertimen.'</select></label>'?>
			<?php //echo print_r($tallertime);?>
		<?php //echo $institutionidp; ?>
		</dd>
	</dl>
	<?php echo $this->Form->end(__('Hacer Inscripción')); ?>
</div>
<div class="actions">
	<h3><?php //echo __('Opciones'); ?></h3>
	<ul>		
		<li><?php //echo $this->Html->link(__('Main Menu'), array('controller' => 'workshops', 'action' => 'index_inscription')); ?> </li>
		<li><?php //echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>