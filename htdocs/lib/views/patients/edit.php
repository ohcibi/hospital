<form action="add" method="post">
<div>Vorname: <input type="text" name="data[Patients][first_name]" value="<?php echo $patient['Patients']['first_name']; ?>" /></div>
<div>Nachname: <input type="text" name="data[Patients][last_name]" value="<?php echo $patient['Patients']['last_name']; ?>" /></div>
<div>Geburtstag: <input type="text" name="data[Patients][birth_day]" value="<?php echo $patient['Patients']['birth_day']; ?>" /></div>
<div>Größe: <input type="text" name="data[Patients][size]" value="<?php echo $patient['Patients']['size']; ?>" /></div>
<div>Geschlecht: <input type="text" name="data[Patients][gender]" value="<?php echo $patient['Patients']['gender']; ?>" /></div>
<div>
    Raum: <select name="data[Patients][rooms_id]" />
        <?php foreach($rooms as $room): ?>
            <?php if ($room['Rooms']['id'] == $patient['Patients']['rooms_id']): ?>
                <option selected="selected" value="<?php echo $room['Rooms']['id']; ?>"><?php echo $room['Rooms']['title']; ?></option>
            <?php else: ?>
                <option value="<?php echo $room['Rooms']['id']; ?>"><?php echo $room['Rooms']['title']; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
</div>
<div><input type="submit" value="Speichern" /></div>
</form>
