<div class="doctors index">
<h2><?php __('Doctors');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('first_name');?></th>
	<th><?php echo $paginator->sort('last_name');?></th>
	<th><?php echo $paginator->sort('special_field_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($doctors as $doctor):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $doctor['Doctor']['id']; ?>
		</td>
		<td>
			<?php echo $doctor['Doctor']['title']; ?>
		</td>
		<td>
			<?php echo $doctor['Doctor']['first_name']; ?>
		</td>
		<td>
			<?php echo $doctor['Doctor']['last_name']; ?>
		</td>
		<td>
			<?php echo $html->link($doctor['SpecialField']['title'], array('controller' => 'special_fields', 'action' => 'view', $doctor['SpecialField']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $doctor['Doctor']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $doctor['Doctor']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $doctor['Doctor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $doctor['Doctor']['id'])); ?>
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
		<li><?php echo $html->link(__('New Doctor', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Special Fields', true), array('controller' => 'special_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Special Field', true), array('controller' => 'special_fields', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Rounds', true), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Round', true), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
