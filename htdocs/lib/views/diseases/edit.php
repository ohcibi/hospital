<?php if (empty($symptoms)): ?>
    <?php echo $html->link('<em>Bitte fügen sie zuerst Symptome hinzu</em>', array('controller' => 'symptoms', 'action' => 'add')); ?>
<?php else: ?>
    <h2><?php echo $disease['Diseases']['title']; ?> bearbeiten</h2>
    <?php echo $html->form(array('url' => array('controller' => 'diseases', 'action' => 'edit', $disease['Diseases']['id']))); ?>
    <input type="hidden" name="data[Diseases][id]" value="<?php echo $disease['Diseases']['id']; ?>" />
    <div>Titel: <input type="text" name="data[Diseases][title]" value="<?php echo $disease['Diseases']['title']; ?>"/></div>
    <div>Beschreibung: <textarea name="data[Diseases][description]"><?php echo $disease['Diseases']['description']; ?></textarea></div>
    <div>
        Symptome: <select name="data[Symptoms][]" multiple="multiple" />
            <?php foreach($symptoms as $symptom): ?>
                <?php
                    $selected = '';
                    if (in_array($symptom['Symptoms']['id'], $disease['Symptoms'])) {
                            $selected = ' selected="selected"';
                    }
                ?>
                <option value="<?php echo $symptom['Symptoms']['id']; ?>"<?php echo $selected; ?>><?php echo $symptom['Symptoms']['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div><input type="submit" value="Speichern" /></div>
    </form>
<?php endif; ?>
