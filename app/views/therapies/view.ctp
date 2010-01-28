<div class="therapies view">
<h2><?php  __('Therapy');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $therapy['Therapy']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Patient'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($therapy['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $therapy['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Doctor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($therapy['Doctor']['title'], array('controller' => 'doctors', 'action' => 'view', $therapy['Doctor']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Disease'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($therapy['Disease']['title'], array('controller' => 'diseases', 'action' => 'view', $therapy['Disease']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Diagnose'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($therapy['Diagnose']['id'], array('controller' => 'diagnoses', 'action' => 'view', $therapy['Diagnose']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Room'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($therapy['Room']['title'], array('controller' => 'rooms', 'action' => 'view', $therapy['Room']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Therapy', true), array('action' => 'edit', $therapy['Therapy']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Therapy', true), array('action' => 'delete', $therapy['Therapy']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $therapy['Therapy']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Therapies', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Therapy', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Rounds');?></h3>
	<?php if (!empty($therapy['Round'])):?>
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
		foreach ($therapy['Round'] as $round):
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
