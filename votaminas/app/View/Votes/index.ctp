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
	<fieldset>
	<legend><?php echo __('Votes'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pool_id'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($votes as $vote): ?>
	<tr>
		<td><?php echo h($vote['Vote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vote['User']['name'], array('controller' => 'users', 'action' => 'view', $vote['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vote['Pool']['name'], array('controller' => 'pools', 'action' => 'view', $vote['Pool']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('Anterior '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(' Próximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</fieldset>
</div>
