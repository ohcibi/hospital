<?php
class StationsController extends Controller {

    var $helpers = array('Html');

    function index() {
        $stations = $this->Stations->findAllWithRooms();

        $this->set(compact('stations'));
    }

    function add() {
        if (!empty($this->data)) {
            if (!$this->Stations->save($this->data)) {
                $this->setFlash('Fehler beim Speichern der Station.', 'error');
            } else {
                $this->setFlash('Station hinzugefügt');
            }
            $this->redirect(array('controller' => 'stations', 'action' => 'index'));
        }
    }

    function edit($stationid) {
        $station = $this->Stations->findFirst(array('conditions' => array('Stations.id' => $stationid)));
        if (false === $station) {
            $this->setFlash('Ungültige Id für Station');
            $this->redirect(array('controller' => 'stations', 'action' => 'index'));
        }

        if (!empty($this->data)) {
            if ($this->Stations->save($this->data)) {
                $this->setFlash('Station gespeichert');
            } else {
                $this->setFlash('Fehler beim Speichern der Station');
            }

            $this->redirect(array('controller' => 'stations', 'action' => 'edit', $stationid));
        }

        $rooms = $this->Stations->Rooms->findByStation($stationid, array('fields' => array('Rooms.id', 'Rooms.title')));

        $this->set(compact('station', 'rooms'));
    }

    function delete($stationid) {
        if ($this->Stations->delete($stationid)) {
            $this->setFlash('Station gelöscht');
        } else {
            $this->setFlash('Fehler beim Löschen der Station');
        }
        $this->redirect(array('controller' => 'stations', 'action' => 'index'));
    }
}
?>
