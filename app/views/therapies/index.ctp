<div class="therapies index">
<h2><?php __('Therapies');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('patient_id');?></th>
	<th><?php echo $paginator->sort('doctor_id');?></th>
	<th><?php echo $paginator->sort('disease_id');?></th>
	<th><?php echo $paginator->sort('diagnose_id');?></th>
	<th><?php echo $paginator->sort('room_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($therapies as $therapy):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $therapy['Therapy']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($therapy['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $therapy['Patient']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($therapy['Doctor']['title'], array('controller' => 'doctors', 'action' => 'view', $therapy['Doctor']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($therapy['Disease']['title'], array('controller' => 'diseases', 'action' => 'view', $therapy['Disease']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($therapy['Diagnose']['id'], array('controller' => 'diagnoses', 'action' => 'view', $therapy['Diagnose']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($therapy['Room']['title'], array('controller' => 'rooms', 'action' => 'view', $therapy['Room']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $therapy['Therapy']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $therapy['Therapy']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $therapy['Therapy']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $therapy['Therapy']['id'])); ?>
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
		<li><?php echo $html->link(__('New Therapy', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Patients', true), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Patient', true), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diseases', true), array('controller' => 'diseases', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnose', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Rooms', true), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Room', true), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Rounds', true), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Round', true), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
	</ul>
</div>
