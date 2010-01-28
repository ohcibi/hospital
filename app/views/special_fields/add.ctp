<div class="specialFields form">
<?php echo $form->create('SpecialField');?>
	<fieldset>
 		<legend><?php __('Add SpecialField');?></legend>
	<?php
		echo $form->input('title');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List SpecialFields', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
