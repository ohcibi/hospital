<?php
class PatientsController extends Controller {
    var $name = 'Patients';

    var $helpers = array('Html');

    function index() {
        $this->set('patients', $this->Patients->findAllWithRooms());
    }

    function add() {
        if (!empty($this->data)) {
            if (!$this->Patients->save($this->data)) {
                $this->setFlash('Fehler beim Speichern des Patienten.', 'error');
                $this->redirect('patients/index');
            } else {
                $this->setFlash('Patient hinzugefügt');
                $this->redirect('patients/index');
            }
        }

        $rooms = $this->Patients->Rooms->findList();

        $this->set(compact('rooms'));
    }
}
?>
