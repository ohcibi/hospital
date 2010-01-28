<div class="symptoms form">
<?php echo $form->create('Symptom');?>
	<fieldset>
 		<legend><?php __('Add Symptom');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('Disease');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Symptoms', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Diseases', true), array('controller' => 'diseases', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add')); ?> </li>
	</ul>
</div>
