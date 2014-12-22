<div class="poolsOptions view">
<h2><?php echo __('Pools Option'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($poolsOption['PoolsOption']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pool'); ?></dt>
		<dd>
			<?php echo $this->Html->link($poolsOption['Pool']['name'], array('controller' => 'pools', 'action' => 'view', $poolsOption['Pool']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Candidate'); ?></dt>
		<dd>
			<?php echo $this->Html->link($poolsOption['Candidate']['name'], array('controller' => 'candidates', 'action' => 'view', $poolsOption['Candidate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Votes Qt'); ?></dt>
		<dd>
			<?php echo h($poolsOption['PoolsOption']['votes_qt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($poolsOption['PoolsOption']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($poolsOption['PoolsOption']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pools Option'), array('action' => 'edit', $poolsOption['PoolsOption']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pools Option'), array('action' => 'delete', $poolsOption['PoolsOption']['id']), array(), __('Are you sure you want to delete # %s?', $poolsOption['PoolsOption']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pools Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pools Option'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pools'), array('controller' => 'pools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pool'), array('controller' => 'pools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Candidates'), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidate'), array('controller' => 'candidates', 'action' => 'add')); ?> </li>
	</ul>
</div>
