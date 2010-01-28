<div class="diseases view">
<h2><?php  __('Disease');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disease['Disease']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disease['Disease']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disease['Disease']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Disease', true), array('action' => 'edit', $disease['Disease']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Disease', true), array('action' => 'delete', $disease['Disease']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disease['Disease']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Diseases', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Symptoms', true), array('controller' => 'symptoms', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Symptom', true), array('controller' => 'symptoms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Diagnoses');?></h3>
	<?php if (!empty($disease['Diagnosis'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Doctor Id'); ?></th>
		<th><?php __('Patient Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Disease Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($disease['Diagnosis'] as $diagnosis):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $diagnosis['id'];?></td>
			<td><?php echo $diagnosis['doctor_id'];?></td>
			<td><?php echo $diagnosis['patient_id'];?></td>
			<td><?php echo $diagnosis['created'];?></td>
			<td><?php echo $diagnosis['disease_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'diagnoses', 'action' => 'view', $diagnosis['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'diagnoses', 'action' => 'edit', $diagnosis['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'diagnoses', 'action' => 'delete', $diagnosis['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diagnosis['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Therapies');?></h3>
	<?php if (!empty($disease['Therapy'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Patient Id'); ?></th>
		<th><?php __('Doctor Id'); ?></th>
		<th><?php __('Disease Id'); ?></th>
		<th><?php __('Diagnose Id'); ?></th>
		<th><?php __('Room Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($disease['Therapy'] as $therapy):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $therapy['id'];?></td>
			<td><?php echo $therapy['patient_id'];?></td>
			<td><?php echo $therapy['doctor_id'];?></td>
			<td><?php echo $therapy['disease_id'];?></td>
			<td><?php echo $therapy['diagnose_id'];?></td>
			<td><?php echo $therapy['room_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'therapies', 'action' => 'view', $therapy['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'therapies', 'action' => 'edit', $therapy['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'therapies', 'action' => 'delete', $therapy['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $therapy['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Symptoms');?></h3>
	<?php if (!empty($disease['Symptom'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($disease['Symptom'] as $symptom):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $symptom['id'];?></td>
			<td><?php echo $symptom['title'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'symptoms', 'action' => 'view', $symptom['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'symptoms', 'action' => 'edit', $symptom['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'symptoms', 'action' => 'delete', $symptom['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $symptom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Symptom', true), array('controller' => 'symptoms', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
