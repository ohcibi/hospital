<?php
class DiagnosesController extends Controller {
    var $helpers = array('Html');

    function index($patientid) {
        $patient = $this->Diagnoses->Patients->findFirstWithDiagnosesOrRounds(array('conditions' => array('Patients.id' => $patientid)));
        if (false === $patient) {
            $this->setFlash('Ungültige Id für Patienten', 'error');
            $this->redirect(array('controller' => 'patients', 'action' => 'index'));
        }

        $this->set(compact('patient', 'diagnoses'));
    }

    function add($patientid) {
        $patient = $this->Diagnoses->Patients->findFirst(array('conditions' => array('Patients.id' => $patientid)));
        if (false === $patient) {
            $this->setFlash('Ungültige Id für Patienten', 'error');
            $this->redirect(array('controller' => 'patients', 'action' => 'index'));
        }
        if (!empty($this->data)) {
            $this->data['Diagnoses']['created'] = date('Y-m-d');
            if ($this->Diagnoses->save($this->data)) {
                $this->setFlash('Diagnose hinzugefügt');
            } else {
                if (mysql_errno() == 1062) {
                    $this->setFlash($patient['Patients']['first_name'] . ' ' . $patient['Patients']['last_name'] . ' ist schon wegen der gewählten Krankheit in Behandlung.', 'warning');
                } else {
                    $this->setFlash('Fehler beim Speichern der Diagnose.', 'error');
                }
            }
            $this->redirect(array('controller' => 'diagnoses', 'action' => 'index', $patientid));
        }

        $doctors = $this->Diagnoses->Doctors->findList(array('fields' => array('Doctors.id', 'Doctors.first_name', 'Doctors.last_name')));
        $diseases = $this->Diagnoses->Diseases->findList();

        $this->set(compact('doctors', 'diseases', 'patient'));
    }

    function delete($patientsid, $diseasesid) {
        if ($this->Diagnoses->delete(null, array('conditions' => array('patients_id' => $patientsid, 'diseases_id' => $diseasesid)))) {
            $this->setFlash('Diagnose gelöscht');
        } else {
            $this->setFlash('Fehler beim Löschen der Diagnose');
        }
        $this->redirect(array('controller' => 'diagnoses', 'action' => 'index', $patientsid));
    }

}
?>
