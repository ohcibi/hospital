<?php
class StationsModel extends Model {

    var $associated = array('Rooms');

    function findAllWithRooms($options = array()) {
        $defaults = array(
            'fields' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $fields = array_merge($fields, array('Stations.id', 'Stations.title', 'Rooms.id', 'Rooms.title'));
        $fields = $this->selectFields(array_unique($fields));


        $query = 'SELECT ' . $fields . ' FROM ' . addbackticks(strtolower($this->name())) . ' AS ' . addbackticks($this->name()) . ' LEFT JOIN `rooms` AS `Rooms` ON (`Rooms`.`stations_id` = ' . addbackticks($this->name()) . '.`id`) ORDER BY `Stations`.`id`';

        $results = $this->query($query);
        if (false === $results) {
            return false;
        }

        reset($results);
        $i = -1;
        $res = array();
        while (list($key, $value) = each($results)) { 
            if (empty($results[($key-1)]) || ($results[($key-1)]['Stations']['id'] != $results[$key]['Stations']['id'])) {
                $res[++$i]['Stations'] = $results[$key]['Stations'];
                $res[$i]['Rooms'] = array();
            }

            if (!empty($results[$key]['Rooms'])) {
                $res[$i]['Rooms'][] = $results[$key]['Rooms'];
            }
        }


        return $res;
    }
}
?>
