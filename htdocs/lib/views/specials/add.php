<h2>Spezialgebiet hinzufügen</h2>
<?php echo $html->form(array('url' => array('controller' => 'specials', 'action' => 'add'))); ?>
<div>Titel: <input type="text" name="data[Specials][title]" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
