<?php $this->set('title_for_layout' , 'Lista institución educativa' );?>
<?php //echo $institution; ?>
<div class="educationalInstitutions index">
	<h2><?php echo __('Educational Institutions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php //echo $this->Paginator->sort('grade'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($educationalInstitutions as $educationalInstitution): ?>
	<tr>
		<td><?php echo h($educationalInstitution['EducationalInstitution']['code']); ?>&nbsp;</td>
		<td><?php echo h($educationalInstitution['EducationalInstitution']['type']); ?>&nbsp;</td>
		<td><?php //echo h($educationalInstitution['EducationalInstitution']['grade']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($educationalInstitution['Institution']['name'], array('controller' => 'institutions', 'action' => 'view', $educationalInstitution['Institution']['id_institution'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $educationalInstitution['EducationalInstitution']['code'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $educationalInstitution['EducationalInstitution']['code'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $educationalInstitution['EducationalInstitution']['code']), null, __('Are you sure you want to delete # %s?', $educationalInstitution['EducationalInstitution']['code'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	/*echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));*/
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} of {:pages}, resultado {:current} registros de {:count} en total, a partir del registro {:start}, que concluye en el {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	 	<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Educational Institution'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('controller' => 'responsibles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Responsible'), array('controller' => 'responsibles', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
