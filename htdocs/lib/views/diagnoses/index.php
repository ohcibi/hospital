<h2>Diagnosen von <?php echo $patient['Patients']['first_name'] . ' ' . $patient['Patients']['last_name']; ?></h2>
<?php if (!empty($patient['Diagnoses'])): ?>
    <table>
        <tr><th>Arzt</th><th>Krankheit</th><th>Diagnosedatum</th><th class="actions">Aktionen</th></tr>
        <?php foreach($patient['Diagnoses'] as $diagnose): ?>
            <tr>
                <td><?php echo $diagnose['Doctors']['title'] . ' ' . $diagnose['Doctors']['first_name'] . ' ' . $diagnose['Doctors']['last_name']; ?></td>
                <td><?php echo $diagnose['Diseases']['title']; ?></td>
                <td><?php echo $diagnose['Diagnoses']['created']; ?></td>
                <td class="actions"><ul><li><?php echo $html->link('Löschen', array('controller' => 'diagnoses', 'action' => 'delete', $diagnose['Diagnoses']['patients_id'], $diagnose['Diagnoses']['diseases_id']), array(), 'Sind Sie sicher, dass sie löschen möchten?'); ?></li></ul></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Diagnosen vorhanden</em>
<?php endif; ?>
