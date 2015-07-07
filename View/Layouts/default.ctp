<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev','');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<title>
		<?php $title_for_layout='Fiesta del Libro';?>
		<?php echo $cakeDescription ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php 
	/*function titulos(){
		$this->layout='prueba';
		$this->set('$title_for_layout','prueba');
	} */
	?>
	<link rel="stylesheet" href="<?php echo Router::url( '/', true );?>/webroot/css/fiesta.css" /> 
	<?php
		echo $this->Html->meta('icon');
	    //echo $html->meta('icon', $html->url('/favicon.ico'));//icono  

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('fiesta');
		echo $this->Html->css('main');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo $this->Html->script('jquery-1.11.1.min');
		echo $this->Html->script('jquery.autoSuggest');
	?>
	<?php echo $this->Html->script('jquery-ui.min');?>
	<?php $body_class=( Configure::read('debug')>0)?'debugging':'production';?>
	
	<script type="text/javascript">
		<?php echo "var absPath='".Router::url( '/', true )."';"; ?>
	</script>
	
	
</head>
<body class="reservas-fiesta">
	<div id="container" class="app-container">
	
		<div id="header">
		</div>		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>		
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('patadelogos.png', array('alt' => $cakeDescription, 'border' => '0')),
					'http://localhost/fiestadellibro/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	
	<?php echo $this->Js->writeBuffer();?>
</body>
<footer>
		<?php echo $this->Html->script('main');?>
		<?php echo $this->Html->script('bootstrap.min');?>
</footer>

</html>
