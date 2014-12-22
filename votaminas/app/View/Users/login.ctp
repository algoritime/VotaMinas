<div class="generalForm">
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
<?php
	echo $this->Form->create();
	echo $this->Form->input('username');
	echo $this->Form->input('password');
?>
<?php echo $this->Form->end(__('Logar')); ?>
	</fieldset>
</div>