<h2>Station hinzufügen</h2>
<?php echo $html->form(array('url' => array('controller' => 'rooms', 'action' => 'add'))); ?>
<div>Titel: <input type="text" name="data[Rooms][title]" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
