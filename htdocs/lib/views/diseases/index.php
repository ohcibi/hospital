<?php if (!empty($diseases)): ?>
    <table>
        <tr>
            <th>ID</th><th>Titel</th><th>Beschreibung</th><th>Symptome</th><th class="actions">Actions</th>
        </tr>
    <?php foreach($diseases as $disease): ?>
        <tr>
            <td><?php echo $disease['Diseases']['id']; ?></td>
            <td><?php echo $disease['Diseases']['title']; ?></td>
            <td><?php echo $disease['Diseases']['description']; ?></td>
            <td><?php echo join(', ', $disease['Symptoms']); ?></td>
            <td class="actions">
                <ul>
                    <li><?php echo $html->link('Bearbeiten', array('controller' => 'diseases', 'action' => 'edit', $disease['Diseases']['id'])); ?></li>
                    <li><?php echo $html->link('Löschen', array('controller' => 'diseases', 'action' => 'delete', $disease['Diseases']['id']), array(), sprintf('Sind Sie sicher, dass sie %s löschen wollen?', $disease['Diseases']['title'])); ?></li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Krankheiten vorhanden</em>
<?php endif; ?>

<ul class="actions">
    <li><?php echo $html->link('Krankheit hinzufügen', array('controller' => 'diseases', 'action' => 'add')); ?></li>
    <li><?php echo $html->link('Symptom hinzufügen', array('controller' => 'symptoms', 'action' => 'add')); ?></li>
    <li><?php echo $html->link('Symptome anzeigen', array('controller' => 'symptoms', 'action' => 'index')); ?></li>
</ul>
