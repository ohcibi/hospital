<?php if (empty($symptoms)): ?>
    <?php echo $html->link('<em>Bitte fügen sie zuerst Symptome hinzu</em>', array('controller' => 'symptoms', 'action' => 'add')); ?>
<?php else: ?>
    <h2>Krankheit hinzufügen</h2>
    <?php echo $html->form(array('url' => array('controller' => 'diseases', 'action' => 'add'))); ?>
    <div>Titel: <input type="text" name="data[Diseases][title]" /></div>
    <div>Beschreibung: <textarea name="data[Diseases][description]" /></textarea></div>
    <div>
        Symptome: <select name="data[Symptoms][]" multiple="multiple" />
            <?php foreach($symptoms as $symptom): ?>
                <option value="<?php echo $symptom['Symptoms']['id']; ?>"><?php echo $symptom['Symptoms']['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div><input type="submit" value="Speichern" /></div>
    </form>
<?php endif; ?>
