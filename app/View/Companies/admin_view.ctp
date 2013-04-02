<div class="companies view">
<h2><?php  echo __('Compañía');?></h2>
	<dl>
		<dt><?php echo __('Parrafo Superior'); ?></dt>
		<dd>
			<?php echo h($company['Company']['parrafo_superior']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo 1'); ?></dt>
		<dd>
			<?php echo h($company['Company']['titulo_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parrafo 1'); ?></dt>
		<dd>
			<?php echo h($company['Company']['parrafo_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen 1'); ?></dt>
		<dd>
			<?php echo h($company['Company']['imagen_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo 2'); ?></dt>
		<dd>
			<?php echo h($company['Company']['titulo_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parrafo 2'); ?></dt>
		<dd>
			<?php echo h($company['Company']['parrafo_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen 2'); ?></dt>
		<dd>
			<?php echo h($company['Company']['imagen_2']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php //echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
	</ul>
</div>