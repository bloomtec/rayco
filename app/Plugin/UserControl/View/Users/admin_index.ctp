<div class="users index">
	<h2><?php echo __('Usuarios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('id', __('ID', true));?></th>-->
			<!--<th><?php echo $this->Paginator->sort('role_id', __('Rol', true));?></th>-->
			<!--<th><?php echo $this->Paginator->sort('username', __('Nombre De Usuario', true));?></th>-->
			<th><?php echo $this->Paginator->sort('email', __('Correo Electrónico', true));?></th>
			<th><?php echo $this->Paginator->sort('nombres', __('Nombre', true));?></th>
			<th><?php echo $this->Paginator->sort('apellidos', __('Apellido', true));?></th>
			<th><?php echo $this->Paginator->sort('es_activo', __('Activo', true));?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<!--<td><?php echo h($user['User']['id']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($user['Role']['role']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($user['User']['username']); ?>&nbsp;</td>-->
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['nombres']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['apellidos']); ?>&nbsp;</td>
		<td>
			<?php
				if($user['User']['es_activo']) {
					echo '<input type="checkbox" checked="checked" disabled="true" />';
				} else {
					echo '<input type="checkbox" disabled="true" />';
				}
			?>
			&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de un total de %count%, desde el %start%, hasta el %end%')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('anterior '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__(' siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last(' >>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Usuario'), array('action' => 'add')); ?></li>
	</ul>
</div>
