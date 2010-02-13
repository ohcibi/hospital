<?php
class PatientsModel extends Model {
    var $associated = array('Rooms');
    function findAllWithRooms($options = array()) {
        $defaults = array(
            'fields' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);


        $selectFields = $this->schema;
        if (!empty($fields)) {
            foreach ($fields as $field) {
                if (!strstr($field, '.')) {
                    $field = $this->name() . '.' . $field;
                }
                $selectFields[] = $field;
            }

            $selectFields = array_intersect($this->schema, $selectFields);
        }

        $selectFields[] = 'Rooms.id';
        $selectFields[] = 'Rooms.title';

        if (is_array($selectFields)) {
            $selectFields = $this->selectFields($selectFields);
        }


        $query = 'SELECT ' . $selectFields . ' FROM ' . addbackticks(strtolower($this->name())) . ' AS ' . addbackticks($this->name()) . ' JOIN `rooms` AS `Rooms` ON (`Rooms`.`id` = ' . addbackticks($this->name()) . '.`rooms_id`)';

        $result = mysql_query($query) or trigger_error('MySQL ERROR (' . mysql_errno() . '): ' . mysql_error());

        $results = array();
        while ($res = mysql_fetch_assoc($result)) {
            $results[] = $res;
        }

        $returnResults = array();
        foreach($results as $key => $value) {
            foreach ($value as $k => $v) {
                $k = explode('.', $k);
                $returnResults[$key][$k[0]][$k[1]] = $v;
            }
        }

        return $returnResults;
    }
}
?>
