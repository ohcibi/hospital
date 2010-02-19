<?php
class DiseasesController extends Controller {

    var $helpers = array('Html');

    function index($name = null) {
        $diseases = $this->Diseases->findAllWithSymptoms();

        $this->set(compact('diseases'));
    }
    function add() {
        if (!empty($this->data)) {
            if ($this->Diseases->save($this->data)) {
                if ($this->Diseases->saveSymptoms($this->Diseases->getLastInsertId(), $this->data['Symptoms'])) {
                    $this->setFlash('Krankheit hinzugefügt');
                } else {
                    $this->setFlash('Fehler beim Speichern der Symptome', 'error');
                }
            } else {
                $this->setFlash('Fehler beim Speichern der Krankheit.', 'error');
            }
            $this->redirect(array('controller' => 'diseases', 'action' => 'index'));
        }

        $symptoms = $this->Diseases->Symptoms->findList();

        $this->set(compact('symptoms'));
    }

    function edit($id = null) {
        $disease = $this->Diseases->findFirstWithSymptoms(array('conditions' => array('Diseases.id' => $id)));
        if (false === $disease) {
            $this->setFlash('Ungültige Id für Krankheit');
            $this->redirect(array('controller' => 'diseases', 'action' => 'index'));
        }

        if (!empty($this->data)) {
            if ($this->Diseases->save($this->data)) {
                if ($this->Diseases->saveSymptoms($id, $this->data['Symptoms'])) {
                    $this->setFlash('Krankheit wurde erfolgreich gespeichert');
                } else {
                    $this->setFlash('Fehler beim Speichern der Symptomassoziationen');#
                }
            } else  {
                $this->setFlash('Krankheit konnte nicht gespeichert werden. Bitte nochmal versuchen.');
            }
            $this->redirect(array('controller' => 'diseases', 'action' => 'edit', $id));
        }

        $symptoms = $this->Diseases->Symptoms->findList();

        $this->set(compact('disease', 'symptoms'));
    }

    function delete($id) {
        if ($this->Diseases->deleteSymptomsAssoc($id)) {
            if ($this->Diseases->delete($id)) {
                $this->setFlash('Krankheit gelöscht');
            } else {
                $this->setFlash('Fehler beim Löschen der Krankheit');
            }
        } else {
            $this->setFlash('Fehler beim Löschen der Symptomassoziationen');
        }
        $this->redirect(array('controller' => 'diseases', 'action' => 'index'));
    }

}
?>
