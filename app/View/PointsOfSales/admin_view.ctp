<div class="pointsOfSales view">
<h2><?php  echo __('Points Of Sale');?></h2>
	<dl>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['nombre']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Dirección'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teléfono'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['telefono']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Celular'); ?></dt>
        <dd>
            <?php echo h($pointsOfSale['PointsOfSale']['celular']); ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['lng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($pointsOfSale['PointsOfSale']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php
	$lat = $pointsOfSale['PointsOfSale']['lat'];
	$lng = $pointsOfSale['PointsOfSale']['lng'];
?>
<iframe
	src="/PointsOfSales/mapView/lat:<?php echo $lat; ?>/lng:<?php echo $lng; ?>"
    height="400px"
    width="100%"
>
</iframe>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modificar Punto De Venta'), array('action' => 'edit', $pointsOfSale['PointsOfSale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Punto De Venta'), array('action' => 'delete', $pointsOfSale['PointsOfSale']['id']), null, __('¿Desea eliminar %s?', $pointsOfSale['PointsOfSale']['nombre'])); ?> </li>
		<li><?php echo $this->Html->link(__('Puntos De Ventas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Punto De Venta'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Imagenes Relacionadas');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Creada'); ?></th>
		<th><?php echo __('Modificada'); ?></th>
	</tr>
	<?php if (!empty($pointsOfSale['Image'])):?>
	<?php $i = 0; foreach ($pointsOfSale['Image'] as $image): ?>
		<tr>
			<td><?php echo $image['id'];?></td>
			<td><?php echo $this -> Html -> image('uploads/50x50/' . $image['image']); ?></td>
			<td><?php echo $image['created'];?></td>
			<td><?php echo $image['modified'];?></td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</table>
</div>