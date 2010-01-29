<?php
class SpecialsController extends Controller {
    var $name = 'Specials';

    function add() {
        if (!empty($this->data)) {
            $this->Specials->save($this->data);
        }
    }
}
?>
