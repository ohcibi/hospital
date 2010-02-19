Filtern:
<?php echo $html->form(array('url' => array('controller' => 'patients', 'action' => 'index'))); ?>
<div>Nachname: <input type="text" name="data[Patients][last_name]" /><input type="submit" value="OK" /></div>
</form>
<?php echo $html->form(array('url' => array('controller' => 'patients', 'action' => 'index'))); ?>
<div>Raum: <select name="data[Patients][rooms_id]"><?php foreach($rooms as $room): ?>
    <option value="<?php echo $room['Rooms']['id']; ?>"><?php echo $room['Stations']['title'] . '.' . $room['Rooms']['title']; ?></option>
<?php endforeach; ?>
<input type="submit" value="OK" /></div>
</form>
<?php echo $html->form(array('url' => array('controller' => 'patients', 'action' => 'index'))); ?>
<div>Behandelnder Arzt: <select name="data[Diagnoses][doctors_id]"><?php foreach($doctors as $doctor): ?>
    <option value="<?php echo $doctor['Doctors']['id']; ?>"><?php echo $doctor['Doctors']['title'] . ' ' . $doctor['Doctors']['last_name']; ?></option>
<?php endforeach; ?>
<input type="submit" value="OK" /></div>
</form>
<?php echo $html->form(array('url' => array('controller' => 'patients', 'action' => 'index'))); ?>
<div>Krankheit: <select name="data[Diagnoses][diseases_id]"><?php foreach($diseases as $disease): ?>
    <option value="<?php echo $disease['Diseases']['id']; ?>"><?php echo $disease['Diseases']['title']; ?></option>
<?php endforeach; ?>
<input type="submit" value="OK" /></div>
</form>
<?php if (!empty($patients)): ?>
    <table>
        <tr>
            <th><?php echo $html->link('Vorname', array('controller' => 'patients', 'action' => 'index', 'first_name', $sort_dir)); ?></th>
            <th><?php echo $html->link('Name', array('controller' => 'patients', 'action' => 'index', 'last_name', $sort_dir)); ?></th>
            <th><?php echo $html->link('Geburtsdatum', array('controller' => 'patients', 'action' => 'index', 'birth_day', $sort_dir)); ?></th>
            <th>Raum</th>
            <th class="actions">Aktionen</th>
        </tr>
    <?php foreach($patients as $patient): ?>
        <tr>
            <td><?php echo $patient['Patients']['first_name']; ?></td>
            <td><?php echo $patient['Patients']['last_name']; ?></td>
            <td><?php echo $patient['Patients']['birth_day']; ?></td>
            <td><?php echo $patient['Stations']['title'] . '.' . $patient['Rooms']['title']; ?></td>
            <td class="actions">
                <ul>
                    <li><?php echo $html->link('Bearbeiten', array('controller' => 'patients', 'action' => 'edit', $patient['Patients']['id'])); ?></li>
                    <li><?php echo $html->link('Diagnosen anzeigen', array('controller' => 'diagnoses', 'action' => 'index', $patient['Patients']['id'])); ?></li>
                    <li><?php echo $html->link('Diagnose erstellen', array('controller' => 'diagnoses', 'action' => 'add', $patient['Patients']['id'])); ?></li>
                    <li><?php echo $html->link('Visiten anzeigen', array('controller' => 'rounds', 'action' => 'index', $patient['Patients']['id'])); ?></li>
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
