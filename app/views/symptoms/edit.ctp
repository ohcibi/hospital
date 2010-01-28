<div class="symptoms form">
<?php echo $form->create('Symptom');?>
	<fieldset>
 		<legend><?php __('Edit Symptom');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('Disease');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Symptom.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Symptom.id'))); ?></li>
		<li><?php echo $html->link(__('List Symptoms', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Diseases', true), array('controller' => 'diseases', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add')); ?> </li>
	</ul>
</div>
