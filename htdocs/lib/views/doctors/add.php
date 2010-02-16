<form action="add" method="post">
<div>Titel: <input type="text" name="data[Doctors][title]" /></div>
<div>Vorname: <input type="text" name="data[Doctors][first_name]" /></div>
<div>Nachname: <input type="text" name="data[Doctors][last_name]" /></div>
<div>
    Spezialgebiet: <select name="data[Doctors][specials_id]" />
        <?php foreach($rooms as $room): ?>
            <option value="<?php echo $room['Specials']['id']; ?>"><?php echo $room['Specials']['title']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div><input type="submit" value="Speichern" /></div>
</form>
