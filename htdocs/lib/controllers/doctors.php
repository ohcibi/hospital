<?php
class DoctorsController extends Controller {
    var $name = 'Doctors';

    var $helpers = array('Html');

    function index($name = null) {
        $doctors = $this->Doctors->findAllWithSpecial();

        $this->set(compact('doctors'));
    }
    function add() {
        if (!empty($this->data)) {
            if ($this->Doctors->save($this->data)) {
                $this->setFlash('Arzt hinzugefügt');
            } else {
                $this->setFlash('Fehler beim Speichern des Arztes.', 'error');
            }
            $this->redirect(array('controller' => 'doctors', 'action' => 'index'));
        }

        $specials = $this->Doctors->Specials->findList();

        $this->set(compact('specials'));
    }

    function edit($id = null) {
        $doctor = $this->Doctors->findFirst(array('conditions' => array('Doctors.id' => $id)));
        if (false === $doctor) {
            $this->setFlash('Ungültige Id für Arzt');
            $this->redirect(array('controller' => 'doctors', 'action' => 'index'));
        }

        if (!empty($this->data)) {
            debug($this->data);
            if ($this->Doctors->save($this->data)) {
                $this->setFlash('Arzt wurde erfolgreich gespeichert');
            } else  {
                $this->setFlash('Arzt konnte nicht gespeichert werden. Bitte nochmal versuchen.');
            }
            $this->redirect(array('controller' => 'doctors', 'action' => 'edit', $id));
        }

        $specials = $this->Doctors->Specials->findList();

        $this->set(compact('doctor', 'specials'));
    }

    function delete($id) {
        if ($this->Doctors->delete($id)) {
            $this->setFlash('Arzt gelöscht');
        } else {
            $this->setFlash('Fehler beim Löschen des Arzten');
        }
        $this->redirect(array('controller' => 'doctors', 'action' => 'index'));
    }

}
?>
