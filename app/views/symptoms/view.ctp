<div class="symptoms view">
<h2><?php  __('Symptom');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $symptom['Symptom']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $symptom['Symptom']['title']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Symptom', true), array('action' => 'edit', $symptom['Symptom']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Symptom', true), array('action' => 'delete', $symptom['Symptom']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $symptom['Symptom']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Symptoms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Symptom', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diseases', true), array('controller' => 'diseases', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Diseases');?></h3>
	<?php if (!empty($symptom['Disease'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Description'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($symptom['Disease'] as $disease):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $disease['id'];?></td>
			<td><?php echo $disease['title'];?></td>
			<td><?php echo $disease['description'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'diseases', 'action' => 'view', $disease['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'diseases', 'action' => 'edit', $disease['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'diseases', 'action' => 'delete', $disease['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disease['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
