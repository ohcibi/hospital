<h2>Diagnose für <?php echo $patient['Patients']['first_name'] . ' ' . $patient['Patients']['last_name']; ?> erstellen</h2>
<?php echo $html->form(array('url' => array('controller' => 'diagnoses', 'action' => 'add', $patient['Patients']['id']))); ?>
<input type="hidden" name="data[Diagnoses][patients_id]" value="<?php echo $patient['Patients']['id']; ?>" />
<div>Arzt: <select name="data[Diagnoses][doctors_id]">
<?php foreach($doctors as $doctor): ?>
<option value="<?php echo $doctor['Doctors']['id']; ?>"><?php echo $doctor['Doctors']['first_name'] . ' ' . $doctor['Doctors']['last_name']; ?></option>
<?php endforeach; ?>
</select></div>
<div>Krankheit: <select name="data[Diagnoses][diseases_id]">
<?php foreach($diseases as $disease): ?>
<option value="<?php echo $disease['Diseases']['id']; ?>"><?php echo $disease['Diseases']['title']; ?></option>
<?php endforeach; ?>
</select></div>
<input type="submit" value="Speichern" />
</form>
