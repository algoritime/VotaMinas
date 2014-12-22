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
		<li><?php echo $this->Html->link(__('Novo candidato'), array('controller' => 'candidates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova enquete'), array('controller' => 'pools', 'action' => 'add')); ?> </li>
	<ul>
</div>
<div class="generalForm">
	<fieldset>
	<legend><?php echo __('Candidatos'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('entourage'); ?></th>
			<th><?php echo $this->Paginator->sort('propose'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($candidates as $candidate): ?>
	<tr>
		<td><?php echo h($candidate['Candidate']['id']); ?>&nbsp;</td>
		<td><?php echo h($candidate['Candidate']['name']); ?>&nbsp;</td>
		<td><?php echo h($candidate['Candidate']['number']); ?>&nbsp;</td>
		<td><?php echo h($candidate['Candidate']['entourage']); ?>&nbsp;</td>
		<td><?php echo h($candidate['Candidate']['propose']); ?>&nbsp;</td>
		<td><?php echo h($candidate['Candidate']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $candidate['Candidate']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $candidate['Candidate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Remover'), array('action' => 'delete', $candidate['Candidate']['id']), array(), __('Are you sure you want to delete # %s?', $candidate['Candidate']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} de {:count} candidatos, começando no candidato {:start} e terminando no {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('voltar '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(' avançar') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</fieldset>
</div>
