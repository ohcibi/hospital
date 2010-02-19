<h2>Raum auf Station <?php echo $station['Stations']['title']; ?> hinzufügen</h2>
<?php echo $html->form(array('url' => array('controller' => 'rooms', 'action' => 'add', $station['Stations']['id']))); ?>
<input type="hidden" name="data[Rooms][stations_id]" value="<?php echo $station['Stations']['id']; ?>" />
<div>Titel: <input type="text" name="data[Rooms][title]" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
