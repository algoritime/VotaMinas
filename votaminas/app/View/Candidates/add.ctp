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
<?php echo $this->Form->create('Candidate', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar candidato'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nome'));
		echo $this->Form->input('number', array('label' => 'Número'));
		echo $this->Form->input('entourage', array('label' => 'Partido'));
		echo $this->Form->input('propose', array('label' => 'Propostas'));
		echo $this->Form->input('type', array(
			                        'label' => 'Posição', 
			                        'type' => 'select', 
			                        'options' => array(
                                       'Presidente' => 'Presidente', 
                                       'Governador' => 'Governador', 
                                       'Senador' => 'Senador', 
                                       'Deputado Federal' => 'Deputado Federal', 
                                       'Deputado Estadual' => 'Deputado Estadual'
                                       )
			                        )
								);
		echo $this->Form->input('image_url', array('label' => 'Foto', 'type' => 'file'));
	?>
	<?php echo $this->Form->end(__('Cadastrar')); ?>
	</fieldset>
</div>
