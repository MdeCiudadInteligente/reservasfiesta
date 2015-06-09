<div class="educationalInstitutions view">
<?php $this->set('title_for_layout' , 'Ver institución Educativa' );?>
<h2><?php echo __('Educational Institution'); ?></h2>
	<dl>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($educationalInstitution['EducationalInstitution']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($educationalInstitution['EducationalInstitution']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php //echo __('Grade'); ?></dt>
		<dd>
			<?php //echo h($educationalInstitution['EducationalInstitution']['grade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo:'); ?></dt>
		<dd>
			<?php echo $this->Html->link($educationalInstitution['Institution']['name'], array('controller' => 'institutions', 'action' => 'view', $educationalInstitution['Institution']['id_institution'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Edit Educational Institution'), array('action' => 'edit', $educationalInstitution['EducationalInstitution']['code'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete Educational Institution'), array('action' => 'delete', $educationalInstitution['EducationalInstitution']['code']), null, __('Are you sure you want to delete # %s?', $educationalInstitution['EducationalInstitution']['code'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Educational Institutions'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Educational Institution'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('controller' => 'responsibles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Responsible'), array('controller' => 'responsibles', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
	