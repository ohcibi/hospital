<h2>Visite für <?php echo $patient['Patients']['first_name'] . ' ' . $patient['Patients']['last_name']; ?> erstellen</h2>
<?php echo $html->form(array('url' => array('controller' => 'rounds', 'action' => 'add', $patient['Patients']['id']))); ?>
<input type="hidden" name="data[Rounds][patients_id]" value="<?php echo $patient['Patients']['id']; ?>" />
<div>Arzt: <select name="data[Rounds][doctors_id]">
<?php foreach($doctors as $doctor): ?>
<option value="<?php echo $doctor['Doctors']['id']; ?>"><?php echo $doctor['Doctors']['first_name'] . ' ' . $doctor['Doctors']['last_name']; ?></option>
<?php endforeach; ?>
</select></div>
<div>Temperatur: <input type="text" name="data[Rounds][temperature]" /> °C</div>
<div>Gewicht: <input type="text" name="data[Rounds][weight]" /> g</div>
<div>Puls: <input type="text" name="data[Rounds][pulse]" /></div>
<div>Blutdruck: <input type="text" name="data[Rounds][blood_pressure_systolic]" />/<input type="text" name="data[Rounds][blood_pressure_diastolic]" /></div>
<input type="submit" value="Speichern" />
</form>
