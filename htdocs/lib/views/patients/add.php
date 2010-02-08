<form action="add" method="post">
<div>Vorname: <input type="text" name="data[Patients][first_name]" /></div>
<div>Nachname: <input type="text" name="data[Patients][last_name]" /></div>
<div>Geburtstag: <input type="text" name="data[Patients][birth_day]" /></div>
<div>Größe: <input type="text" name="data[Patients][size]" /></div>
<div>Geschlecht: <input type="text" name="data[Patients][gender]" /></div>
<div>
    Raum: <select name="data[Patients][rooms_id]" />
        <?php foreach($rooms as $room): ?>
            <option value="<?php echo $room['Rooms']['id']; ?>"><?php echo $room['Rooms']['title']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div><input type="submit" value="Speichern" />
</form>
