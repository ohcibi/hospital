<?php
class RoomsController extends Controller {
    var $name = 'Rooms';

    function add() {
        if (!empty($this->data)) {
            if (!$this->Patients->save($this->data)) {
            }
        }
    }
}
?>
