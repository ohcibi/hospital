<form action="add" method="post">
<div>Titel: <input type="text" name="data[Doctors][title]" /></div>
<div>Beschreibung: <textarea name="data[Doctors][description]" /></div>
<div>
    Symptome: <select name="data[Symptoms][]" multiple="multiple" />
        <?php foreach($symptoms as $symptom): ?>
            <option value="<?php echo $symptom['Symptoms']['id']; ?>"><?php echo $symptom['Symptoms']['title']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div><input type="submit" value="Speichern" /></div>
</form>

