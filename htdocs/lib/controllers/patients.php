<?php
class PatientsController extends Controller {
    var $name = 'Patients';

    var $helpers = array('Html');

    function index($sort = null, $sort_dir = null) {
        if (!in_array($sort, array('first_name', 'last_name', 'birth_day'))) {
            $sort = null;
        }

        $order = null;
        if (null !== $sort) {
            if (null === $sort_dir) {
                $sort_dir = 'ASC';
            }
            $str_sort_dir = ' ' . $sort_dir;
            $order = array('order' => 'Patients.' . $sort . $str_sort_dir);
            if ($sort_dir == 'ASC') {
                $sort_dir = 'DESC';
            } else {
                $sort_dir = 'ASC';
            }
        }

        $conditions = $joins = array();
        if (!empty($this->data)) {
            if (!empty($this->data['Diagnoses'])) {
                $joins = array(
                    array(
                        'table' => 'diagnoses',
                        'alias' => 'Diagnoses',
                        'type' => 'inner',
                        'conditions' => array('Diagnoses.patients_id = Patients.id')
                    )
                );
            }

            foreach ($this->data as $key => $value) {
                foreach ($value as $k => $v) {
                    $conditions[$key . '.' . $k] = $v;
                }
            }
        }

        $patients = $this->Patients->findAllWithRooms(compact('conditions', 'order', 'joins'));

        $rooms = $this->Patients->Rooms->findAll(array(
            'joins' => array(
                array(
                    'table' => 'stations',
                    'alias' => 'Stations',
                    'type' => 'inner',
                    'conditions' => array('Stations.id = Rooms.stations_id')
                )
            ),
            'fields' => array('Rooms.id', 'Rooms.title', 'Stations.title')
        ));

        $diseases = $this->Patients->Diagnoses->Diseases->findAll();
        $doctors = $this->Patients->Diagnoses->Doctors->findAll();

        $this->set(compact('patients', 'filter', 'sort_dir', 'sort', 'rooms', 'diseases', 'doctors'));
    }

    function add() {
        if (!empty($this->data)) {
            $this->data['Patients']['birth_day'] = makedate($this->data['Patients']['birth_day']);
            if (!$this->Patients->save($this->data)) {
                $this->setFlash('Fehler beim Speichern des Patienten.', 'error');
            } else {
                $this->setFlash('Patient hinzugefügt');
            }
            $this->redirect(array('controller' => 'patients', 'action' => 'index'));
        }

        $rooms = $this->Patients->Rooms->findList();

        $this->set(compact('rooms'));
    }

    function edit($id = null) {
        $patient = $this->Patients->findFirst(array('conditions' => array('Patients.id' => $id)));
        if (false === $patient) {
            $this->setFlash('Ungültige Id für Patienten');
            $this->redirect(array('controller' => 'patients', 'action' => 'index'));
        }

        if (!empty($this->data)) {
            $this->data['Patients']['birth_day'] = makedate($this->data['Patients']['birth_day']);
            if ($this->Patients->save($this->data)) {
                $this->setFlash('Patient wurde erfolgreich gespeichert');
            } else  {
                $this->setFlash('Patient konnte nicht gespeichert werden. Bitte nochmal versuchen.');
            }
            $this->redirect(array('controller' => 'patients', 'action' => 'edit', $id));
        }

        $rooms = $this->Patients->Rooms->findList();

        $this->set(compact('patient', 'rooms'));
    }

    function delete($id) {
        if ($this->Patients->delete($id)) {
            $this->setFlash('Patient gelöscht');
        } else {
            $this->setFlash('Fehler beim Löschen des Patienten');
        }
        $this->redirect(array('controller' => 'patients', 'action' => 'index'));
    }

    function search($first_name = null, $last_name = null) {
        $query = "SELECT * FROM patients WHERE first_name = '" . $first_name . "' AND last_name = '" . $last_name . "' ORDER BY last_name, first_name";

        $qResults = mysql_query($query);

        $results = array();
        while ($result = mysql_fetch_array($qResults)) {
            $results[] = $result;
        }

        reset($results);
        $newResults = array();
        $current = null;
        while (list($key, $value) = each($results)) {
            if (!empty($results[($key-1)]) && $results[$key]['last_name'] != $results[($key-1)]) {
                $current = $results[$key]['last_name'];
            }
            $newResults[$current] = $value;
        }


        $patients = $newResults;
        $this->set(compact('patients', 'first_name', 'last_name'));
    }
}
?>
