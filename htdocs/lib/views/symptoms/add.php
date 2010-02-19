<h2>Symptom hinzufügen</h2>
<?php echo $html->form(array('url' => array('controller' => 'symptoms', 'action' => 'add'))); ?>
<div>Titel: <input type="text" name="data[Symptoms][title]" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
