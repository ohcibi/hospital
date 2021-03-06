<?php if (!empty($doctors)): ?>
    <table>
        <tr>
            <th>Titel</th><th>Vorname</th><th>Name</th><th>Spezialgebiet</th><th class="actions">Actions</th>
        </tr>
    <?php foreach($doctors as $doctor): ?>
        <tr>
            <td><?php echo $doctor['Doctors']['title']; ?></td>
            <td><?php echo $doctor['Doctors']['first_name']; ?></td>
            <td><?php echo $doctor['Doctors']['last_name']; ?></td>
            <td><?php echo $doctor['Specials']['title']; ?></td>
            <td class="actions">
                <ul>
                    <li><?php echo $html->link('Bearbeiten', array('controller' => 'doctors', 'action' => 'edit', $doctor['Doctors']['id'])); ?></li>
                    <li><?php echo $html->link('Löschen', array('controller' => 'doctors', 'action' => 'delete', $doctor['Doctors']['id']), array(), sprintf('Sind Sie sicher, dass sie %s %s löschen wollen?', $doctor['Doctors']['first_name'], $doctor['Doctors']['last_name'])); ?></li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Ärzte vorhanden</em>
<?php endif; ?>

<ul class="actions">
    <li><?php echo $html->link('Arzt hinzufügen', array('controller' => 'doctors', 'action' => 'add')); ?></li>
    <li><?php echo $html->link('Spezialgebiet hinzufügen', array('controller' => 'specials', 'action' => 'add')); ?></li>
</ul>
