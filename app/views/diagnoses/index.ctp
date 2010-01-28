<div class="diagnoses index">
<h2><?php __('Diagnoses');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('doctor_id');?></th>
	<th><?php echo $paginator->sort('patient_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('disease_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($diagnoses as $diagnosis):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $diagnosis['Diagnosis']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($diagnosis['Doctor']['title'], array('controller' => 'doctors', 'action' => 'view', $diagnosis['Doctor']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($diagnosis['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $diagnosis['Patient']['id'])); ?>
		</td>
		<td>
			<?php echo $diagnosis['Diagnosis']['created']; ?>
		</td>
		<td>
			<?php echo $html->link($diagnosis['Disease']['title'], array('controller' => 'diseases', 'action' => 'view', $diagnosis['Disease']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $diagnosis['Diagnosis']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $diagnosis['Diagnosis']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $diagnosis['Diagnosis']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diagnosis['Diagnosis']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Diagnosis', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Patients', true), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Patient', true), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diseases', true), array('controller' => 'diseases', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add')); ?> </li>
	</ul>
</div>
