<div class="diagnoses form">
<?php echo $form->create('Diagnosis');?>
	<fieldset>
 		<legend><?php __('Edit Diagnosis');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('doctor_id');
		echo $form->input('patient_id');
		echo $form->input('disease_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Diagnosis.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Diagnosis.id'))); ?></li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Patients', true), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Patient', true), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diseases', true), array('controller' => 'diseases', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add')); ?> </li>
	</ul>
</div>
