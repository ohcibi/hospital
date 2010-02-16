<?php if (!empty($stations)): ?>
    <table>
        <tr>
            <th>ID</th><th>Titel</th><th>Räume</th><th class="actions">Actions</th>
        </tr>
    <?php foreach($stations as $station): ?>
        <tr>
            <td><?php echo $station['Stations']['id']; ?></td>
            <td><?php echo $station['Stations']['title']; ?></td>
            <td>
            <?php if(!empty($station['Rooms'])): ?>
                <?php echo join(', ', $station['Rooms']); ?>
            <?php else: ?>
                <em>Keine Räume</em>
            <?php endif; ?>
            </td>
            <td class="actions">
            <ul>
                <li><?php echo $html->link('Raum hinzufügen', array('controller' => 'rooms', 'action' => 'add', $station['Stations']['id'])); ?></li>
                <li><?php echo $html->link('Bearbeiten', array('controller' => 'stations', 'action' => 'edit', $station['Stations']['id'])); ?></li>
                <li><?php echo $html->link('Löschen', array('controller' => 'stations', 'action' => 'delete', $station['Stations']['id'])); ?></li>
            </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
    <em>Noch keine Stationen vorhanden</em>
<?php endif; ?>

<ul class="actions">
    <li><?php echo $html->link('Station hinzufügen', array('controller' => 'stations', 'action' => 'add')); ?></li>
    <li><?php echo $html->link('Raum hinzufügen', array('controller' => 'rooms', 'action' => 'add')); ?></li>
</ul>
