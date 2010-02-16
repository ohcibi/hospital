<h2>Station hinzufügen</h2>
<?php echo $html->form(array('url' => array('controller' => 'rooms', 'action' => 'add'))); ?>
<input type="hidden" name="data[Rooms][stations_id]" value="<?php echo $stationid; ?>" />
<div>Titel: <input type="text" name="data[Rooms][title]" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
