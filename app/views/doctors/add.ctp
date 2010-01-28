<div class="doctors form">
<?php echo $form->create('Doctor');?>
	<fieldset>
 		<legend><?php __('Add Doctor');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('first_name');
		echo $form->input('last_name');
		echo $form->input('special_field_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Doctors', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Special Fields', true), array('controller' => 'special_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Special Field', true), array('controller' => 'special_fields', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Rounds', true), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Round', true), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
