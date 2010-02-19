<?php if (empty($specials)): ?>
    <?php echo $html->link('<em>Bitte zuerst ein Spezialgebiet hinzufügen</em>', array('controller' => 'specials', 'action' => 'add')); ?>
<?php else: ?>
    <?php echo $html->form(array('url' => array('controller' => 'doctors', 'action' => 'edit', $doctor['Doctors']['id']))); ?>
    <input type="hidden" name="data[Doctors][id]" value="<?php echo $doctor['Doctors']['id']; ?>" />
    <div>Titel: <input type="text" name="data[Doctors][title]" value="<?php echo $doctor['Doctors']['title']; ?>" /></div>
    <div>Vorname: <input type="text" name="data[Doctors][first_name]" value="<?php echo $doctor['Doctors']['first_name']; ?>" /></div>
    <div>Nachname: <input type="text" name="data[Doctors][last_name]" value="<?php echo $doctor['Doctors']['last_name']; ?>" /></div>
    <div>
        Spezialgebiet: <select name="data[Doctors][specials_id]" />
            <?php foreach($specials as $special): ?>
                <?php
                    $selected = '';
                    if ($special['Specials']['id'] == $doctor['Doctors']['specials_id']) {
                        $selected = ' selected="selected"';
                    }
                ?>
                <option value="<?php echo $special['Specials']['id']; ?>"<?php echo $selected; ?>><?php echo $special['Specials']['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div><input type="submit" value="Speichern" /></div>
    </form>
<?php endif; ?>
