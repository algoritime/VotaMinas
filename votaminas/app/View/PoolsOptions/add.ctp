<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar opções de enquete'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar enquetes'), array('controller' => 'pools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova enquete'), array('controller' => 'pools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar candidatos'), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo candidato'), array('controller' => 'candidates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="generalForm">
<?php echo $this->Form->create('PoolsOption'); ?>
	<fieldset>
		<legend><?php echo __('Add opção em enquete'); ?></legend>
	<?php
		echo $this->Form->input('pool_id', array(
                    'empty' => 'Selecione a enquete',
                    'label' => 'Enquete'
                ));
		echo $this->Form->input('candidate_id', array('label' => 'Candidatos',
			                        'type' => 'select', 'empty' => 'Selecione uma enquete'));
		echo $this->Form->hidden('votes_qt', array('default' => '0'));
	?>
	<?php echo $this->Form->end(__('Cadastrar')); ?>
	</fieldset>
</div>

<?php
	$this->Js->get('#PoolsOptionPoolId')->event(
		'change',
		$this->Js->request(
			array(
				'controller'=>'candidates',
				'action'=>'getByType'
			),
			array(
				'update'=>'#PoolsOptionCandidateId',
				'async' => true,
				'method' => 'post',
				'dataExpression'=>true,
				'data'=> $this->Js->serializeForm(
					array(
						'isForm' => true,
						'inline' => true
					)
				)
			)
		)
	);
?>