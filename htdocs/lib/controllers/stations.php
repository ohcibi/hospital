<?php
class StationsController extends Controller {
    var $name = 'Stations';

    var $helpers = array('Html');

    function index() {
        $stations = $this->Stations->findAllWithRooms();

        $this->set(compact('stations'));
    }

    function add() {
        if (!empty($this->data)) {
            if (!$this->Stations->save($this->data)) {
                $this->setFlash('Fehler beim Speichern der Station.', 'error');
                $this->redirect('stations/index');
            } else {
                $this->setFlash('Station hinzugefügt');
                $this->redirect('stations/index');
            }
        }
    }
}
?>
