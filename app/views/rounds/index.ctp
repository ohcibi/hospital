<div class="rounds index">
<h2><?php __('Rounds');?></h2>
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
	<th><?php echo $paginator->sort('therapy_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('temperature');?></th>
	<th><?php echo $paginator->sort('weight');?></th>
	<th><?php echo $paginator->sort('pulse');?></th>
	<th><?php echo $paginator->sort('blood_pressure_systolic');?></th>
	<th><?php echo $paginator->sort('blood_pressure_diastolic');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($rounds as $round):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $round['Round']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($round['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $round['Patient']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($round['Doctor']['title'], array('controller' => 'doctors', 'action' => 'view', $round['Doctor']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($round['Therapy']['id'], array('controller' => 'therapies', 'action' => 'view', $round['Therapy']['id'])); ?>
		</td>
		<td>
			<?php echo $round['Round']['created']; ?>
		</td>
		<td>
			<?php echo $round['Round']['temperature']; ?>
		</td>
		<td>
			<?php echo $round['Round']['weight']; ?>
		</td>
		<td>
			<?php echo $round['Round']['pulse']; ?>
		</td>
		<td>
			<?php echo $round['Round']['blood_pressure_systolic']; ?>
		</td>
		<td>
			<?php echo $round['Round']['blood_pressure_diastolic']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $round['Round']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $round['Round']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $round['Round']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $round['Round']['id'])); ?>
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
		<li><?php echo $html->link(__('New Round', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Patients', true), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Patient', true), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
