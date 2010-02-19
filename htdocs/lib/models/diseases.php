<?php
class DiseasesModel extends Model {
    var $associated = array('Symptoms', 'Diagnoses');

    function findAllWithSymptoms($options = array()) {
        $defaults = array(
            'fields' => array('id', 'title', 'description', 'Symptoms.title'),
            'conditions' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $joins = array(
            array(
                'table' => 'diseases_symptoms',
                'alias' => 'DiseasesSymptoms',
                'type' => 'inner',
                'conditions' => array('DiseasesSymptoms.diseases_id = Diseases.id')
            ),
            array(
                'table' => 'symptoms',
                'alias' => 'Symptoms',
                'type' => 'inner',
                'conditions' => array('Symptoms.id = DiseasesSymptoms.symptoms_id')
            )
        );

        $order = 'Diseases.id';

        $results = $this->findAll(compact('order', 'joins', 'fields', 'conditions'));

        $diseases = array();
        reset($results);
        $i = -1;
        while (list($key, $value) = each($results)) {
            if (empty($results[($key-1)]) || $results[($key-1)]['Diseases']['id'] != $value['Diseases']['id']) {
                $diseases[++$i]['Diseases'] = $value['Diseases'];
                $diseases[$i]['Symptoms'] = array();
            }

            $diseases[$i]['Symptoms'][] = array_pop($value['Symptoms']);
        }

        return $diseases;
    }

    function findFirstWithSymptoms($options = array()) {
        $defaults = array(
            'fields' => array('id', 'title', 'description', 'Symptoms.id'),
            'conditions' => array()
        );
        $options = array_merge($defaults, $options);

        if (false === ($results = $this->findAllWithSymptoms($options))) {
            return false;
        }

        return $results[0];
    }

    function saveSymptoms($id, $symptoms) {
        if (false === $this->deleteSymptomsAssoc($id)) {
            return false;
        }

        foreach ($symptoms as $symptom) {
            $fields = array('symptoms_id' => $symptom, 'diseases_id' => $id);
            $table = 'diseases_symptoms';
            $query = $this->makeQuery(compact('table', 'fields'), 'insert');
            if (!mysql_query($query)) {
                trigger_error('SQL ERROR (' . mysql_errno() . '): ' . mysql_error() . '<br />' . $query, E_USER_WARNING);
                return false;
            }
        }

        return true;
    }

    function deleteSymptomsAssoc($id) {
        $table = 'diseases_symptoms';
        $conditions = array('Diseases_symptoms.diseases_id' => $id);
        $query = $this->makeQuery(compact('table', 'conditions'), 'delete');
        if (!mysql_query($query)) {
            trigger_error('SQL ERROR (' . mysql_errno() . '): ' . mysql_error() . '<br />' . $query, E_USER_WARNING);
            return false;
        }

        return true;
    }
}
?>
