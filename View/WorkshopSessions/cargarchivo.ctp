<div class="workshopSessions form">
<?php echo $this->Form->create('WorkshopSession',array('type'=>'file')); ?>
	<fieldset>
	<td>
		<p><h2>Carga de ProgramaciÃ³n de archivos</h2></p>

	</td>
	<td>
		<p>Suba el archivo en formato de texto <strong>csv separado por comas</strong> como el siguiente:
		<?php echo $this->Html->link('Ejemplo',array('controller' => 'webroot',
		'action' =>'img\ejemplocsv.jpg'),array('target'=>'_blank'));?>&nbsp;
		</p>
	</td>
		<?php 
				echo $this->Form->input('seleccionar_archivo',array('type'=>'file','label'=>''));
				echo $this->Form->input('dir',array('hidden','label'=>''));
		?>
		
		</fieldset>
		<?php echo $this->Form->end(__('Cargar datos')); ?>
		<?php if (isset($messages))
		{
			foreach ($messages['messages'] as $message)
			{
				echo $message;	?>	
				<br>				
			<?php	}
			
	 }?>
	 
	 <?php if (isset($messages))
		{
			if($messages['errors']!=null)
			{
			
			foreach ($messages['errors'] as $error)
			{
				echo $error;	?>	
				<br>				
			<?php	}
			}
			else 
			{
				echo "No existe ningún error";
			}
			
	 }?>
			
			
</div>

<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>