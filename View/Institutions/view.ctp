<div class="institutions view">
<?php $this->set('title_for_layout' , 'Ver Institución' );?>
<h2><?php echo __('Institution'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['address']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['city']); ?>
			&nbsp;
		</dd>	
		<dt><?php echo __('Comune'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['comune']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comune'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['comune']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Neighborhood'); ?></dt>
		
		<dd>
			<?php echo h($institution['Institution']['neighborhood']); ?>
			&nbsp;
		</dd>		
		
		<dt><?php echo __('Tipo Institución:'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['inst_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Institución educativa:'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['educational_inst_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Código DANE:'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['code_education']); ?>
			&nbsp;
		</dd>
		</dl>		
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>	
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>	
		<li><?php echo $this->Html->link(__('List Institutions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Institution'), array('action' => 'edit', $institution['Institution']['id_institution'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Institución'), array('action' => 'delete', $institution['Institution']['id_institution']), null, __('Está seguro que desea eliminar # %s?', $institution['Institution']['id_institution'])); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>