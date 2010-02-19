<?php
class SymptomsController extends Controller {
    var $helpers = array('Html');

    function index($name = null) {
        $symptoms = $this->Symptoms->findAll();

        $this->set(compact('symptoms'));
    }
    function add() {
        if (!empty($this->data)) {
            if ($this->Symptoms->save($this->data)) {
                $this->setFlash('Symptom hinzugefügt');
            } else {
                $this->setFlash('Fehler beim Speichern des Symptoms', 'error');
            }
            $this->redirect(array('controller' => 'symptoms', 'action' => 'index'));
        }
    }

    function edit($id = null) {
        $symptom = $this->Symptoms->findFirst(array('conditions' => array('Symptoms.id' => $id)));
        if (false === $symptom) {
            $this->setFlash('Ungültige Id für Symptom', 'warning');
            $this->redirect(array('controller' => 'symptoms', 'action' => 'index'));
        }

        if (!empty($this->data)) {
            if ($this->Symptoms->save($this->data)) {
                $this->setFlash('Symptom wurde erfolgreich gespeichert');
            } else  {
                $this->setFlash('Symptom konnte nicht gespeichert werden. Bitte nochmal versuchen.', 'error');
            }
            $this->redirect(array('controller' => 'symptoms', 'action' => 'edit', $id));
        }

        $this->set(compact('symptom'));
    }

    function delete($id) {
        if ($this->Symptoms->deleteAssoc($id)) {
            if ($this->Symptoms->delete($id)) {
                $this->setFlash('Symptom gelöscht');
            } else {
                $this->setFlash('Fehler beim Löschen des Symptoms', 'error');
            }
        } else {
            $this->setFlash('Fehler beim Löschen der Krankheitsassoziationen', 'error');
        }
        $this->redirect(array('controller' => 'symptoms', 'action' => 'index'));
    }

}
