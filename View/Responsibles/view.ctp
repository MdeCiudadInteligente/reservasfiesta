<div class="responsibles view">
<?php $this->set('title_for_layout' , 'Ver responsable' );?>
<h2><?php echo __('Responsible'); ?></h2>
	<dl>
		<dt><?php echo __('Id Responsable:'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['id_responsible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre:'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular:'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correo:'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institución Educativa:'); ?></dt>
		<dd>
			<?php echo $this->Html->link($responsible['Institution']['id_institution'], array('controller' => 'institutions', 'action' => 'view', $responsible['Institution']['id_institution'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Edit Responsible'), array('action' => 'edit', $responsible['Responsible']['id_responsible'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete Responsible'), array('action' => 'delete', $responsible['Responsible']['id_responsible']), null, __('Are you sure you want to delete # %s?', $responsible['Responsible']['id_responsible'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Responsible'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Educational Institutions'), array('controller' => 'educational_institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Educational Institution'), array('controller' => 'educational_institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
