<div class="rooms form">
<?php echo $form->create('Room');?>
	<fieldset>
 		<legend><?php __('Edit Room');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('station_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Room.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Room.id'))); ?></li>
		<li><?php echo $html->link(__('List Rooms', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Stations', true), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Station', true), array('controller' => 'stations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
