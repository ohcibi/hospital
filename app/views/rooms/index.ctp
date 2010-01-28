<div class="rooms index">
<h2><?php __('Rooms');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('station_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($rooms as $room):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $room['Room']['id']; ?>
		</td>
		<td>
			<?php echo $room['Room']['title']; ?>
		</td>
		<td>
			<?php echo $html->link($room['Station']['title'], array('controller' => 'stations', 'action' => 'view', $room['Station']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $room['Room']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $room['Room']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $room['Room']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $room['Room']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Room', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Stations', true), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Station', true), array('controller' => 'stations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
