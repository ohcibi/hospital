<div class="specialFields view">
<h2><?php  __('SpecialField');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specialField['SpecialField']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $specialField['SpecialField']['title']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit SpecialField', true), array('action' => 'edit', $specialField['SpecialField']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete SpecialField', true), array('action' => 'delete', $specialField['SpecialField']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $specialField['SpecialField']['id'])); ?> </li>
		<li><?php echo $html->link(__('List SpecialFields', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New SpecialField', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Doctors', true), array('controller' => 'doctors', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Doctors');?></h3>
	<?php if (!empty($specialField['Doctor'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('First Name'); ?></th>
		<th><?php __('Last Name'); ?></th>
		<th><?php __('Special Field Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($specialField['Doctor'] as $doctor):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $doctor['id'];?></td>
			<td><?php echo $doctor['title'];?></td>
			<td><?php echo $doctor['first_name'];?></td>
			<td><?php echo $doctor['last_name'];?></td>
			<td><?php echo $doctor['special_field_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'doctors', 'action' => 'view', $doctor['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'doctors', 'action' => 'edit', $doctor['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'doctors', 'action' => 'delete', $doctor['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $doctor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Doctor', true), array('controller' => 'doctors', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
