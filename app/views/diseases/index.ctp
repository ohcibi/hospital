<div class="diseases index">
<h2><?php __('Diseases');?></h2>
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
	<th><?php echo $paginator->sort('description');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($diseases as $disease):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $disease['Disease']['id']; ?>
		</td>
		<td>
			<?php echo $disease['Disease']['title']; ?>
		</td>
		<td>
			<?php echo $disease['Disease']['description']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $disease['Disease']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $disease['Disease']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $disease['Disease']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disease['Disease']['id'])); ?>
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
		<li><?php echo $html->link(__('New Disease', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Symptoms', true), array('controller' => 'symptoms', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Symptom', true), array('controller' => 'symptoms', 'action' => 'add')); ?> </li>
	</ul>
</div>
