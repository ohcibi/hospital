<?php echo $html->form(array('url' => array('controller' => 'patients', 'action' => 'edit', $patient['Patients']['id']))); ?>
<input type="hidden" name="data[Patients][id]" value="<?php echo $patient['Patients']['id']; ?>" />
<div>Vorname: <input type="text" name="data[Patients][first_name]" value="<?php echo $patient['Patients']['first_name']; ?>" /></div>
    <div>Nachname: <input type="text" name="data[Patients][last_name]" value="<?php echo $patient['Patients']['last_name']; ?>" /></div>
<div>Geburtstag: <?php echo $html->datetime('Patients.birth_day', array('selected' => $patient['Patients']['birth_day'])); ?></div>
<div>Größe: <input type="text" name="data[Patients][size]" value="<?php echo $patient['Patients']['size']; ?>" /></div>
<div>Geschlecht: 
    <select name="data[Patients][gender]" />
        <option <?php echo ($patient['Patients']['gender'] == 'm') ? 'selected="selected"' : ''; ?>value="m">Männlich</option>
        <option <?php echo ($patient['Patients']['gender'] == 'w') ? 'selected="selected"' : ''; ?>value="w">Weiblich</option>
    </select>
</div>
<div>
    Raum: <select name="data[Patients][rooms_id]" />
        <?php foreach($rooms as $room): ?>
            <?php 
                $selected = '';
                if ($room['Rooms']['id'] == $patient['Patients']['rooms_id']) {
                    $selected = 'selected="selected"';
                }
            ?>
            <option value="<?php echo $room['Rooms']['id']; ?>"<?php echo $selected; ?>><?php echo $room['Rooms']['title']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div><input type="submit" value="Speichern" /></div>
</form>
