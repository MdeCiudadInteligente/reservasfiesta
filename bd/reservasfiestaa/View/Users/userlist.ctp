<div class="Users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add user'); ?></legend>
		<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('user'); ?></th>
			<th class="actions"><?php //echo __('Opciones'); ?></th>
		</tr>	
		<?php foreach ($allusers as $allusers): ?>		
			<tr>
				<td><?php echo h($allusers['user']['username']); ?>&nbsp;</td>
				<td class="actions">
				<?php $userupd=$allusers['user']['username']; ?>
					<?php echo $this->Html->link(__('cambiar contrasena'), array('controller' => 'users','action' => 'enviarcorreo',$userupd,$cedresponsable)); ?>			
				</td>
			</tr>
		<?php endforeach;?>	
</table>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>

