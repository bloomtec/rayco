<div class="related">
	<h3><?php echo __('Imagenes Relacionadas');?></h3>
	<table cellpadding = "0" cellspacing = "0">
		<tbody id="RelatedImagesTableBody">
			<tr>
				<th><?php echo __('ID'); ?></th>
				<th><?php echo __('Image'); ?></th>
				<th><?php echo __('Descripción'); ?></th>
				<th class="actions"><?php echo __('Acciones');?></th>
			</tr>
			<?php if(!empty($this -> request -> data['Image'])) : ?>
			<?php $i = 0; foreach ($this -> request -> data['Image'] as $image): ?>
			<tr>
				<td><?php echo $image['id'];?></td>
				<td><?php echo $this -> Html -> image('uploads/50x50/' . $image['image']); ?></td>
				<td><?php echo $image['descripcion'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('controller' => 'images', 'action' => 'view', $image['id'])); ?>
					<?php echo $this->Html->link(__('Modificar'), array('controller' => 'images', 'action' => 'edit', $image['id'])); ?>
					<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'images', 'action' => 'delete', $image['id'], $image['model_class'], $image['foreign_key']), null, __('¿Desea eliminar la imagen con ID %s?', $image['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>