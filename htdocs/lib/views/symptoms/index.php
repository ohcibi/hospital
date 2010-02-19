<?php if (!empty($symptoms)): ?>
    <table>
        <tr>
            <th>Titel</th><th class="actions">Actions</th>
        </tr>
    <?php foreach($symptoms as $symptom): ?>
        <tr>
            <td><?php echo $symptom['Symptoms']['title']; ?></td>
            <td class="actions">
            <ul>
                <li><?php echo $html->link('Bearbeiten', array('controller' => 'symptoms', 'action' => 'edit', $symptom['Symptoms']['id'])); ?></li>
                <li><?php echo $html->link('Löschen', array('controller' => 'symptoms', 'action' => 'delete', $symptom['Symptoms']['id']), array(), sprintf('Sicher, dass sie Symptom %s löschen wollen?', $symptom['Symptoms']['title'])); ?></li>
            </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Symptomen vorhanden</em>
<?php endif; ?>

<ul class="actions">
    <li><?php echo $html->link('Symptom hinzufügen', array('controller' => 'symptoms', 'action' => 'add')); ?></li>
</ul>
