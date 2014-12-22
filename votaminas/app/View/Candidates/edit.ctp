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
	<!-- <h3><?php echo __('Actions'); ?></h3> -->
	<ul>

		<li><?php echo $this->Form->postLink(__('Deletar Candidato'), array('action' => 'delete', $this->Form->value('Candidate.id')), array(), __('Você tem certeza que deseja excluir o candidato # %s?', $this->Form->value('Candidate.id'))); ?></li>
	</ul>
</div>
<div class="generalForm">
<?php echo $this->Form->create('Candidate', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Candidate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('number');
		echo $this->Form->input('entourage');
		echo $this->Form->input('propose');
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
		echo $this->Html->image($this->Html->url('/', true) . 'app/webroot/' . $this->request->data['Candidate']['image_url']);
		echo $this->Form->input('image_url', array('label' => 'Selecionar nova foto', 'type' => 'file', 'value' => $this->request->data['Candidate']['image_url']));
		echo $this->Form->hidden('image_url_saved', array('value' => $image_url_saved));
		echo $this->Form->end(__('Enviar')); ?>
	</fieldset>
</div>

