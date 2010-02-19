<h2><?php echo $special['Specials']['title']; ?> bearbeiten</h2>
<?php echo $html->form(array('url' => array('controller' => 'specials', 'action' => 'edit', $special['Specials']['id']))); ?>
<input type="hidden" name="data[Specials][id]" value="<?php echo $special['Specials']['id']; ?>" />
<div>Titel: <input type="text" name="data[Specials][title]" value="<?php echo $special['Specials']['title']; ?>" /></div>
<div><input type="submit" value="Speichern" /></div>
</form>
