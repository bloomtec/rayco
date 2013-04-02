<div class="companies index">
	<h2><?php echo __('Companies');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('titulo_1');?></th>
			<th><?php echo $this->Paginator->sort('imagen_1');?></th>
			<th><?php echo $this->Paginator->sort('titulo_2');?></th>
			<th><?php echo $this->Paginator->sort('imagen_2');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php
		foreach($companies as $company): ?>
			<tr>
				<td><?php echo h($company['Company']['titulo_1']); ?>&nbsp;</td>
				<td>
					<img src="<?php echo '/img/uploads/150x150/' . h($company['Company']['imagen_1']); ?>">
				</td>
				<td><?php echo h($company['Company']['titulo_2']); ?>&nbsp;</td>
				<td>
					<img src="<?php echo '/img/uploads/150x150/' . h($company['Company']['imagen_2']); ?>">
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $company['Company']['id'])); ?>
					<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $company['Company']['id'])); ?>
					<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php
		echo $this->Paginator->counter(array(
			                               'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		                               ));
		?>    </p>

	<div class="paging">
		<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
