<?php
class RoomsController extends Controller {
    var $name = 'Rooms';

    var $helpers = array('Html');

    function add($stationid = null) {
        $station = $this->Rooms->Stations->findFirst(array('conditions' => array('Stations.id' => $stationid)));
        if (false === $station) {
            $this->setFlash('Ungültige Id für Station');
            $this->redirect(array('controller' => 'stations', 'action' => 'index'));
        }

        if (!empty($this->data)) {
            if ($this->Rooms->save($this->data)) {
                $this->setFlash('Raum hinzugefügt');
            } else {
                $this->setFlash('Fehler beim hinzufügen des Raumes');
            }
            $this->redirect(array('controller' => 'stations', 'action' => 'edit', $stationid));
        } 

        $this->set(compact('station'));
    }
}
?>
