<div class="stations view">
<h2><?php  __('Station');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $station['Station']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $station['Station']['title']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Station', true), array('action' => 'edit', $station['Station']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Station', true), array('action' => 'delete', $station['Station']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $station['Station']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Stations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Station', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Rooms', true), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Room', true), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Rooms');?></h3>
	<?php if (!empty($station['Room'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Station Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($station['Room'] as $room):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $room['id'];?></td>
			<td><?php echo $room['title'];?></td>
			<td><?php echo $room['station_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'rooms', 'action' => 'view', $room['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'rooms', 'action' => 'edit', $room['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'rooms', 'action' => 'delete', $room['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $room['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Room', true), array('controller' => 'rooms', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
