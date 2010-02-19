<?php if (empty($specials)): ?>
    <?php echo $html->link('<em>Bitte zuerst ein Spezialgebiet hinzufügen</em>', array('controller' => 'specials', 'action' => 'add')); ?>
<?php else: ?>
    <?php echo $html->form(array('url' => array('controller' => 'doctors', 'action' => 'add'))); ?>
    <div>Titel: <input type="text" name="data[Doctors][title]" /></div>
    <div>Vorname: <input type="text" name="data[Doctors][first_name]" /></div>
    <div>Nachname: <input type="text" name="data[Doctors][last_name]" /></div>
    <div>
        Spezialgebiet: <select name="data[Doctors][specials_id]" />
            <?php foreach($specials as $special): ?>
                <option value="<?php echo $special['Specials']['id']; ?>"><?php echo $special['Specials']['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div><input type="submit" value="Speichern" /></div>
    </form>
<?php endif; ?>
