<div class="stations form">
<?php echo $form->create('Station');?>
	<fieldset>
 		<legend><?php __('Edit Station');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Station.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Station.id'))); ?></li>
		<li><?php echo $html->link(__('List Stations', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Rooms', true), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Room', true), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
