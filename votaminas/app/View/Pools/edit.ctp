<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar enquetes'), array('controller' => 'pools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar opções em enquete'), array('controller' => 'poolsoptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar candidatos'), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar votos'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
	</ul>
</div>

<div class="actions">
	<ul>

		<li><?php echo $this->Form->postLink(__('Excluir enquete'), array('action' => 'delete', $this->Form->value('Pool.id')), array(), __('Você tem certeza que deseja remover # %s?', $this->Form->value('Pool.id'))); ?></li>
	</ul>
</div>
<div class="generalForm">
<?php echo $this->Form->create('Pool'); ?>
	<fieldset>
		<legend><?php echo __('Editar Enquete'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Nome'));
		echo $this->Form->input('question', array('label' => 'Pergunta'));
	?>
	<?php echo $this->Form->end(__('Enviar')); ?>
	</fieldset>
</div>

