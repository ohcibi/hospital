<div class="patients view">
<h2><?php  __('Patient');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $patient['Patient']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $patient['Patient']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $patient['Patient']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Birth Day'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $patient['Patient']['birth_day']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gender'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $patient['Patient']['gender']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $patient['Patient']['size']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Patient', true), array('action' => 'edit', $patient['Patient']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Patient', true), array('action' => 'delete', $patient['Patient']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $patient['Patient']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Patients', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Patient', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('controller' => 'diagnoses', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('controller' => 'diagnoses', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Rounds', true), array('controller' => 'rounds', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Round', true), array('controller' => 'rounds', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('controller' => 'therapies', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('controller' => 'therapies', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Diagnoses');?></h3>
	<?php if (!empty($patient['Diagnosis'])):?>
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
		foreach ($patient['Diagnosis'] as $diagnosis):
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
	<h3><?php __('Related Rounds');?></h3>
	<?php if (!empty($patient['Round'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Patient Id'); ?></th>
		<th><?php __('Doctor Id'); ?></th>
		<th><?php __('Therapy Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Temperature'); ?></th>
		<th><?php __('Weight'); ?></th>
		<th><?php __('Pulse'); ?></th>
		<th><?php __('Blood Pressure Systolic'); ?></th>
		<th><?php __('Blood Pressure Diastolic'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($patient['Round'] as $round):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $round['id'];?></td>
			<td><?php echo $round['patient_id'];?></td>
			<td><?php echo $round['doctor_id'];?></td>
			<td><?php echo $round['therapy_id'];?></td>
			<td><?php echo $round['created'];?></td>
			<td><?php echo $round['temperature'];?></td>
			<td><?php echo $round['weight'];?></td>
			<td><?php echo $round['pulse'];?></td>
			<td><?php echo $round['blood_pressure_systolic'];?></td>
			<td><?php echo $round['blood_pressure_diastolic'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'rounds', 'action' => 'view', $round['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'rounds', 'action' => 'edit', $round['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'rounds', 'action' => 'delete', $round['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $round['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Round', true), array('controller' => 'rounds', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Therapies');?></h3>
	<?php if (!empty($patient['Therapy'])):?>
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
		foreach ($patient['Therapy'] as $therapy):
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
