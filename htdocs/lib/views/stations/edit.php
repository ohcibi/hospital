<h2>Station <?php echo $station['Stations']['title']; ?> bearbeiten</h2>
<?php echo $html->form(array('url' => array('controller' => 'stations', 'action' => 'edit', $station['Stations']['id']))); ?>
<input type="hidden" name="data[Stations][id]" value="<?php echo $station['Stations']['id']; ?>"/>
<div>Titel: <input type="text" name="data[Stations][title]" value="<?php echo $station['Stations']['title']; ?>"/></div>
<div><input type="submit" value="Speichern" /></div>
</form>
<?php if (!empty($rooms)): ?>
    <table>
        <tr><th>ID</th><th>Titel</th><th class="actions">Actions</th></tr>
    <?php foreach($rooms as $room): ?>
        <tr>
            <td><?php echo $room['Rooms']['id']; ?></td><td><?php echo $room['Rooms']['title']; ?></td>
            <td class="actions">
                <ul>
                <li><?php echo $html->link('Bearbeiten', array('controller' => 'rooms', 'action' => 'edit', $rooms['Rooms']['id'])); ?></li>
                <li><?php echo $html->link('Löschen', array('controller' => 'rooms', 'action' => 'delete', $rooms['Rooms']['id'])); ?></li>
                </ul>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php else: ?>
<em>Noch keine Räume vorhanden</em>
<?php endif; ?>
<ul class="actions">
    <li><?php echo $html->link('Raum hinzufügen', array('controller' => 'rooms', 'action' => 'add', $station['Stations']['id'])); ?></li>
</ul>
