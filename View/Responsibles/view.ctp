<div class="responsibles view">
<h2><?php echo __('Responsible'); ?></h2>
	<dl>
		<dt><?php echo __('Id Responsible'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['id_responsible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permission Level'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['permission_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identity'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['identity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($responsible['Responsible']['mail']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Responsible'), array('action' => 'edit', $responsible['Responsible']['id_responsible'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Responsible'), array('action' => 'delete', $responsible['Responsible']['id_responsible']), null, __('Are you sure you want to delete # %s?', $responsible['Responsible']['id_responsible'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsible'), array('action' => 'add')); ?> </li>
	</ul>
</div>
