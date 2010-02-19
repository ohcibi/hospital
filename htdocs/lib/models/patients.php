<?php
class PatientsModel extends Model {
    var $associated = array('Rooms', 'Diagnoses', 'Rounds');
    function findAllWithRooms($options = array()) {
        $defaults = array(
            'fields' => array(),
            'order' => array(),
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $fields = array_merge($fields, array('Patients.id', 'Patients.first_name', 'Patients.last_name', 'Patients.birth_day', 'Rooms.id', 'Rooms.title'));

        $joins = array(
            array(
                'table' => 'rooms',
                'alias' => 'Rooms',
                'type' => 'inner',
                'conditions' => array('Rooms.id = Patients.id')
            )
        );
        $query = $this->makeQuery(compact('fields', 'order', 'joins'));

        return $this->query($query);
    }

    function findFirstWithDiagnosesOrRounds($options = array()) {
        $results = $this->findAllWithDiagnosesOrRounds($options);
        return $results[0];
    }

    function findAllWithDiagnosesOrRounds($options = array()) {
        $defaults = array(
            'conditions' => array(),
            'assoc' => 'Diagnoses'
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $joins = array(
            array(
                'table' => strtolower($assoc),
                'alias' => $assoc,
                'type' => 'left',
                'conditions' => array($assoc . '.patients_id = Patients.id')
            ),
            array(
                'table' => 'doctors',
                'alias' => 'Doctors',
                'type' => 'left',
                'conditions' => array('Doctors.id = ' . $assoc . '.doctors_id')
            )
        );

        $fields = array('id', 'first_name', 'last_name', $assoc . '.created', 'Doctors.title', 'Doctors.first_name', 'Doctors.last_name');
        if ($assoc == 'Diagnoses') {
            $joins[] = array(
                'table' => 'diseases',
                'alias' => 'Diseases',
                'type' => 'left',
                'conditions' => array('Diseases.id = ' . $assoc . '.diseases_id')
            );
            $fields[] = 'Diagnoses.diseases_id';
            $fields[] = 'Diagnoses.patients_id';
            $fields[] = 'Diseases.title';
        }
        if ($assoc == 'Rounds') {
            $fields[] = 'Rounds.id';
            $fields[] = 'Rounds.temperature';
            $fields[] = 'Rounds.weight';
            $fields[] = 'Rounds.pulse';
            $fields[] = 'Rounds.blood_pressure_systolic';
            $fields[] = 'Rounds.blood_pressure_diastolic';
        }

        $order = array('Patients.id');
        if ($assoc == 'Diagnoses') {
            $order[] = 'Diagnoses.diseases_id';
        }
        if ($assoc == 'Rounds') {
            $order[] = 'Rounds.created';
        }

        $results = $this->findAll(compact('conditions', 'joins', 'fields', 'order'));

        if (false === $results) {
            return false;
        }

        reset($results);
        $i = -1;
        while (list($key, $value) = each($results)) {
            if (empty($results[($key-1)]) || $results[($key-1)]['Patients']['id'] != $value['Patients']['id']) {
                $patients[++$i]['Patients'] = $value['Patients'];
                $patients[$i][$assoc] = array();
            }

            if ($assoc == 'Diagnoses') {
                $patients[$i][$assoc][] = array(
                    $assoc => $value[$assoc],
                    'Doctors' => $value['Doctors'],
                    'Diseases' => $value['Diseases']
                );
            } else {
                $patients[$i][$assoc][] = array(
                    $assoc => $value[$assoc],
                    'Doctors' => $value['Doctors'],
                );
            }
        }

        return $patients;
    }
}
?>
