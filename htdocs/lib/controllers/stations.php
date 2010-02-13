<?php
class StationsController extends Controller {
    var $name = 'Stations';

    var $helpers = array('Html');

    function index() {
        $stations = $this->Stations->findAllWithRooms();

        $this->set(compact('stations'));
    }
}
?>
