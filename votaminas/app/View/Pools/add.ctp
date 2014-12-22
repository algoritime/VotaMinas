<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar enquetes'), array('controller' => 'pools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar opções em enquete'), array('controller' => 'poolsoptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar candidatos'), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar votos'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
	</ul>
</div>

<div class="generalForm">
<?php echo $this->Form->create('Pool'); ?>
	<fieldset>
		<legend><?php echo __('Add Enquete'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Tipo', 'type' => 'select', 'options' =>array('Presidente' => 'Presidente', 'Governador' => 'Governador', 'Senador' => 'Senador', 'Deputado Federal' => 'Deputado Federal', 'Deputado Estadual' => 'Deputado Estadual' )));
		echo $this->Form->input('question', array('label' => 'Pergunta'));
	?>
	<?php echo $this->Form->end(__('Cadastrar')); ?>
	</fieldset>
</div>
