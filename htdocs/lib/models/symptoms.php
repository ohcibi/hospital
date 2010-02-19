<?php
class SymptomsModel extends Model {
    var $associated = array('Diseases');

    function deleteAssoc($id) {
        $table = 'diseases_symptoms';
        $conditions = array('Diseases_symptoms.symptoms_id' => $id);
        $query = $this->makeQuery(compact('table', 'conditions'), 'delete');
        if (!mysql_query($query)) {
            trigger_error('SQL ERROR (' . mysql_errno() . '): ' . mysql_error() . '<br />' . $query, E_USER_WARNING);
            return false;
        }

        return true;
    }
}
?>
