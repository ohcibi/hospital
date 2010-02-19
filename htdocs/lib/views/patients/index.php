<?php if (!empty($patients)): ?>
    <table>
        <tr>
            <th>Vorname</th><th>Name</th><th>Raum</th><th class="actions">Actions</th>
        </tr>
    <?php foreach($patients as $patient): ?>
        <tr>
            <td><?php echo $patient['Patients']['first_name']; ?></td>
            <td><?php echo $patient['Patients']['last_name']; ?></td>
            <td><?php echo $patient['Rooms']['title']; ?></td>
            <td class="actions">
                <ul>
                    <li><?php echo $html->link('Bearbeiten', array('controller' => 'patients', 'action' => 'edit', $patient['Patients']['id'])); ?></li>
                    <li><?php echo $html->link('Diagnose erstellen', array('controller' => 'diagnoses', 'action' => 'add', $patient['Patients']['id'])); ?></li>
                    <li><?php echo $html->link('Visite erstellen', array('controller' => 'rounds', 'action' => 'add', $patient['Patients']['id'])); ?></li>
                    <li><?php echo $html->link('Löschen', array('controller' => 'patients', 'action' => 'delete', $patient['Patients']['id'])); ?></li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Patienten vorhanden</em>
<?php endif; ?>

<ul class="actions">
    <li><?php echo $html->link('Patient hinzufügen', array('controller' => 'patients', 'action' => 'add')); ?></li>
</ul>
