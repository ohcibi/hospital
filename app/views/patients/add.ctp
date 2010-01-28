<div class="patients form">
<?php echo $form->create('Patient');?>
	<fieldset>
 		<legend><?php __('Add Patient');?></legend>
	<?php
		echo $form->input('first_name');
		echo $form->input('last_name');
		echo $form->input('birth_day');
		echo $form->input('gender');
		echo $form->input('size');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Patients', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Rounds', true), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Round', true), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
