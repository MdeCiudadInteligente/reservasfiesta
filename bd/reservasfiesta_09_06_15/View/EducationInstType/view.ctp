<div class="EducationInstType view">
<h2><?php echo __('EducationInstType'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($educationinsttype['EducationInstType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit EducationInstType'), array('action' => 'edit', $educationinsttype['EducationInstType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete EducationInstType'), array('action' => 'delete', $educationinsttype['EducationInstType']['id']), null, __('Are you sure you want to delete # %s?', $educationinsttype['EducationInstType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List EducationInstType'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New EducationInstType'), array('action' => 'add')); ?> </li>
	</ul>
</div>
