<div class="rooms view">
<h2><?php  __('Room');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Station'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($room['Station']['title'], array('controller' => 'stations', 'action' => 'view', $room['Station']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Room', true), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Room', true), array('action' => 'delete', $room['Room']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $room['Room']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Rooms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Room', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Stations', true), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Station', true), array('controller' => 'stations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Therapies');?></h3>
	<?php if (!empty($room['Therapy'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Patient Id'); ?></th>
		<th><?php __('Doctor Id'); ?></th>
		<th><?php __('Disease Id'); ?></th>
		<th><?php __('Diagnose Id'); ?></th>
		<th><?php __('Room Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($room['Therapy'] as $therapy):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $therapy['id'];?></td>
			<td><?php echo $therapy['patient_id'];?></td>
			<td><?php echo $therapy['doctor_id'];?></td>
			<td><?php echo $therapy['disease_id'];?></td>
			<td><?php echo $therapy['diagnose_id'];?></td>
			<td><?php echo $therapy['room_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'therapies', 'action' => 'view', $therapy['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'therapies', 'action' => 'edit', $therapy['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'therapies', 'action' => 'delete', $therapy['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $therapy['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
