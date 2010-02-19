<h2><?php echo $symptom['Symptoms']['title']; ?> bearbeiten</h2>
<?php echo $html->form(array('url' => array('controller' => 'symptoms', 'action' => 'edit', $symptom['Symptoms']['id']))); ?>
<input type="hidden" name="data[Symptoms][id]" value="<?php echo $symptom['Symptoms']['id']; ?>" />
<div>Titel: <input type="text" name="data[Symptoms][title]" value="<?php echo $symptom['Symptoms']['title']; ?>" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
