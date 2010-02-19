<?php
class RoundsController extends Controller {
    var $helpers = array('Html');

    function index($patientid) {
        $patient = $this->Rounds->Patients->findFirstWithDiagnosesOrRounds(array('assoc' => 'Rounds', 'conditions' => array('Patients.id' => $patientid)));
        if (false === $patient) {
            $this->setFlash('Ungültige Id für Patienten', 'error');
            $this->redirect(array('controller' => 'patients', 'action' => 'index'));
        }

        $this->set(compact('patient', 'diagnoses'));
    }

    function add($patientid) {
        $patient = $this->Rounds->Patients->findFirst(array('conditions' => array('Patients.id' => $patientid)));
        if (false === $patient) {
            $this->setFlash('Ungültige Id für Patienten', 'error');
            $this->redirect(array('controller' => 'patients', 'action' => 'index'));
        }
        if (!empty($this->data)) {
            $this->data['Rounds']['created'] = date('Y-m-d');
            if ($this->Rounds->save($this->data)) {
                $this->setFlash('Visite hinzugefügt');
            } else {
                $this->setFlash('Fehler beim Speichern der Visite.', 'error');
            }
            $this->redirect(array('controller' => 'rounds', 'action' => 'index', $patientid));
        }

        $doctors = $this->Rounds->Doctors->findList(array('fields' => array('Doctors.id', 'Doctors.first_name', 'Doctors.last_name')));

        $this->set(compact('doctors', 'patient'));
    }

}
?>
