<?php
if($logged_in){
?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar enquetes'), array('controller' => 'pools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar opções em enquete'), array('controller' => 'poolsoptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar candidatos'), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar votos'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
	</ul>
</div>
<?php
}
?>

<div class="generalForm">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php

				if($logged_in){
					echo __('Cadastro de Administrador');
				}
				else{
					echo __('Cadastro');
				}
			?>
		</legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
	?>
	<?php echo $this->Form->end(__('Cadastrar')); ?>
	</fieldset>
</div>
