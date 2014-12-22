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
		<li><?php echo $this->Html->link(__('Nova enquete'), array('controller' => 'pools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Add opções'), array('controller' => 'poolsOptions', 'action' => 'add')); ?></li>
	<ul>
</div>


<div class="generalForm">
	<fieldset>
	<legend><?php echo __('Enquetes'); ?></h2></legend>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('question'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($pools as $pool): ?>
	<tr>
		<td><?php echo h($pool['Pool']['id']); ?>&nbsp;</td>
		<td><?php echo h($pool['Pool']['name']); ?>&nbsp;</td>
		<td><?php echo h($pool['Pool']['question']); ?>&nbsp;</td>
		<td><?php echo h($pool['Pool']['created']); ?>&nbsp;</td>
		<td><?php echo h($pool['Pool']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pool['Pool']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $pool['Pool']['id']), array(), __('Você tem certeza que deseja remover # %s?', $pool['Pool']['id'])); ?>
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
