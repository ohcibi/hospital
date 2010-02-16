<h2>Station hinzufügen</h2>
<?php echo $html->form(array('url' => array('controller' => 'stations', 'action' => 'add'))); ?>
<div>Titel: <input type="text" name="data[Stations][title]" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
