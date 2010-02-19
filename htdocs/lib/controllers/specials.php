<?php
class SpecialsController extends Controller {
    var $helpers = array('Html');

    function index() {
        $specials = $this->Specials->findAll();

        $this->set(compact('specials'));
    }

    function add() {
        if (!empty($this->data)) {
            if (!$this->Specials->save($this->data)) {
                $this->setFlash('Fehler beim Speichern des Spezialgebietes.', 'error');
            } else {
                $this->setFlash('Spezialgebiet hinzugefügt');
            }
            $this->redirect(array('controller' => 'specials', 'action' => 'index'));
        }
    }

    function edit($id) {
        $special = $this->Specials->findFirst(array('conditions' => array('Specials.id' => $id)));
        if (false === $special) {
            $this->setFlash('Ungültige Id für Spezialgebiet');
            $this->redirect(array('controller' => 'specials', 'action' => 'index'));
        }

        if (!empty($this->data)) {
            if ($this->Specials->save($this->data)) {
                $this->setFlash('Spezialgebiet gespeichert');
            } else {
                $this->setFlash('Fehler beim Speichern des Spezialgebietes');
            }

            $this->redirect(array('controller' => 'specials', 'action' => 'index'));
        }

        $this->set(compact('special')); 
    }

    function delete($id) {
        if ($this->Specials->delete($id)) {
            $this->setFlash('Spezialgebiet gelöscht');
        } else {
            $this->setFlash('Fehler beim Löschen des Spezialgebietes');
        }
        $this->redirect(array('controller' => 'specials', 'action' => 'index'));
    }
}
?>
