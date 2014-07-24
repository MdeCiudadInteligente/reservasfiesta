<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Por favor ingrese su cédula'); ?>
        </legend>
        <b><?php echo $this->Form->input('cedresponsable',array('label'=>'Cédula Responsable'));
    ?></b>
    </fieldset>
<?php echo $this->Form->end(__('Buscar nombres de usuario')); ?>
</div>