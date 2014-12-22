<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar enquetes'), array('controller' => 'pools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar opções em enquete'), array('controller' => 'poolsOptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar usuários'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar candidatos'), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar votos'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar candidato'), array('action' => 'edit', $candidate['Candidate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Deletar candidato'), array('action' => 'delete', $candidate['Candidate']['id']), array(), __('Are you sure you want to delete # %s?', $candidate['Candidate']['id'])); ?> </li>
	</ul>
</div>
<div class="candidates">
	<fieldset>
	<legend><?php echo __('Candidato'); ?></legend>
	<div class="contentList">
		<?php echo $this->Html->image($this->Html->url('/', true) . 'app/webroot/' . $candidate['Candidate']['image_url']); ?>
		<p>Id: <?php echo h($candidate['Candidate']['id']); ?></p>
		<p>Nome: <?php echo h($candidate['Candidate']['name']); ?></p>
		<p>Número: <?php echo h($candidate['Candidate']['number']); ?></p>
		<p>Partido: <?php echo h($candidate['Candidate']['entourage']); ?></p>
		<p>Propostas: <?php echo h($candidate['Candidate']['propose']); ?></p>
		<p>Cargo: <?php echo h($candidate['Candidate']['type']); ?></p>
		<p>Criado em: <?php echo h($candidate['Candidate']['created']); ?></p>
		<p>Modificado em: <?php echo h($candidate['Candidate']['modified']); ?></p>
	</div>
</fieldset>
</div>
</div>
