<div class="diseases form">
<?php echo $form->create('Disease');?>
	<fieldset>
 		<legend><?php __('Edit Disease');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('description');
		echo $form->input('Symptom');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Disease.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Disease.id'))); ?></li>
		<li><?php echo $html->link(__('List Diseases', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Symptoms', true), array('controller' => 'symptoms', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Symptom', true), array('controller' => 'symptoms', 'action' => 'add')); ?> </li>
	</ul>
</div>
