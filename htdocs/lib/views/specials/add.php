<form id="SpecialAddForm" method="post" action="/specials/add">
    <legend>Spezialgebiet hinzufügen</legend>
        <div class="input text"><label for="SpecialsTitle">Title</label><input name="data[Specials][title]" type="text" maxlength="100" value="" id="SpecialsTitle" /></div>    
    </fieldset>
    <div class="submit"><input type="submit" value="Submit" /></div>
</form>

<div class="actions">
    <ul>
    <li><?php echo $html->link('Spezialgebiete anzeigen', array('controller' => 'specials', 'action' => 'index')); ?></li>
    </ul>
</div>
