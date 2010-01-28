<div class="rounds form">
<?php echo $form->create('Round');?>
	<fieldset>
 		<legend><?php __('Edit Round');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('patient_id');
		echo $form->input('doctor_id');
		echo $form->input('therapy_id');
		echo $form->input('temperature');
		echo $form->input('weight');
		echo $form->input('pulse');
		echo $form->input('blood_pressure_systolic');
		echo $form->input('blood_pressure_diastolic');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Round.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Round.id'))); ?></li>
		<li><?php echo $html->link(__('List Rounds', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Patients', true), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Patient', true), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
