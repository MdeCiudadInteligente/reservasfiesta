<script language="javascript">
function informacion(form)
{
var city = document.getElementById('city').options;
var combo = document.getElementById('comune').options;



alert(city);

    if (city[0].selected == true)
    {
        var seleccionar = new Option("","","","");
    	combo[0] = seleccionar;
    	document.getElementById('neighborhood').style.display='block';
    	//document.getElementById('comune').style.type="hidden";
    	
    }
    
    if (city[1].selected == true)
    {
    	
        
    	document.getElementById('neighborhood').style.visibility='visible';
    	document.getElementById('comune').style.visibility='visible';



    }
    if (city[2].selected == true)
    {
    	document.getElementById('comune').style.visibility='hidden';
    }

}
 </script>
<div class="institutions form">
<?php echo $this->Form->create('Institution'); ?>
	<fieldset>
		<legend><?php echo __('Add Institution'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('mail');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		//echo $this->Form->input('city');
		echo $this->Form->input('city',array ('id' => 'city','onChange'=>'informacion(this)','options' => array ('Seleccione una ciudad'=>'Seleccione una ciudad','Medellin'=>'Medellin','Otras'=>'Otras')));
		?>
		<div id="comune" class="input text required" style="visibility:hidden">
		<?php
		echo $this->Form->input('comune',array('id' => 'comune','options' => array ('1 - Popular'=>'1 - Popular','2 - Santa Cruz'=>'2 - Santa Cruz' ,'3 - Manrique'=>'3 - Manrique','4 - Aranjuez'=>'4 - Aranjuez',
		'5 - Castilla'=>'5 - Castilla','6 - Doce De Octubre'=>'6 - Doce De Octubre','7 - Robledo'=>'7 - Robledo','8 - VIlla Hermosa'=>'8 - VIlla Hermosa','9 - Buenos Aires'=>'9 - Buenos Aires',
		'10 - la Candelaria'=>'10 - la Candelaria','11 - Laureles - Estadio'=>'11 - Laureles - Estadio')));
		?>
		</div>
		<div id="neighborhood" class="input text required" style="visibility:hidden">
		<?php
		//echo $this->Form->input('neighborhood',array ('id' => 'neighborhood','type' => 'hidden'));
		echo $this->Form->input('neighborhood',array ('id' => 'neighborhood'));
		?>
		</div>
		<?php 
		echo $this->Form->input('members_number');
		echo $this->Form->input('age_range');
		echo $this->Form->input('public_type');
		echo $this->Form->input('specific_condition');
		echo $this->Form->input('institution_type');
		echo $this->Form->input('workshop_session_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Institutions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshop Sessions'), array('controller' => 'workshop_sessions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop Session'), array('controller' => 'workshop_sessions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
