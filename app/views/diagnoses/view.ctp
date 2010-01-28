<div class="diagnoses view">
<h2><?php  __('Diagnosis');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diagnosis['Diagnosis']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Doctor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($diagnosis['Doctor']['title'], array('controller' => 'doctors', 'action' => 'view', $diagnosis['Doctor']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Patient'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($diagnosis['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $diagnosis['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $diagnosis['Diagnosis']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Disease'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($diagnosis['Disease']['title'], array('controller' => 'diseases', 'action' => 'view', $diagnosis['Disease']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Diagnosis', true), array('action' => 'edit', $diagnosis['Diagnosis']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Diagnosis', true), array('action' => 'delete', $diagnosis['Diagnosis']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $diagnosis['Diagnosis']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Diagnoses', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Diagnosis', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Patients', true), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Patient', true), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Diseases', true), array('controller' => 'diseases', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Disease', true), array('controller' => 'diseases', 'action' => 'add')); ?> </li>
	</ul>
</div>
