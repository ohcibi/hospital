<?php
class RoomsController extends Controller {
    var $name = 'Rooms';

    function add($stationid = null) {
        if (!empty($this->data)) {
            if (!$this->Rooms->save($this->data)) {
            }
        }

        $this->set(compact('stationid'));
    }
}
?>
