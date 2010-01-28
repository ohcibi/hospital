<div class="doctors view">
<h2><?php  __('Doctor');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $doctor['Doctor']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $doctor['Doctor']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('First Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $doctor['Doctor']['first_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $doctor['Doctor']['last_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Special Field'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($doctor['SpecialField']['title'], array('controller' => 'special_fields', 'action' => 'view', $doctor['SpecialField']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Doctor', true), array('action' => 'edit', $doctor['Doctor']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Doctor', true), array('action' => 'delete', $doctor['Doctor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $doctor['Doctor']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Doctors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Diagnoses');?></h3>
	<?php if (!empty($doctor['Diagnosis'])):?>
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
		foreach ($doctor['Diagnosis'] as $diagnosis):
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
	<?php if (!empty($doctor['Round'])):?>
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
		foreach ($doctor['Round'] as $round):
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
	<?php if (!empty($doctor['Therapy'])):?>
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
		foreach ($doctor['Therapy'] as $therapy):
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
