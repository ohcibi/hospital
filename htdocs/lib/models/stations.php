<?php
class StationsModel extends Model {

    function findAllWithRooms($options = array()) {
        $defaults = array(
            'fields' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $fields[] = array('Rooms.id', 'Rooms.title');
        $fields = $this->selectFields(array_unique($fields));


        $query = 'SELECT ' . $fields . ' FROM ' . addbackticks(strtolower($this->name())) . ' AS ' . addbackticks($this->name()) . ' LEFT JOIN `rooms` AS `Rooms` ON (`Rooms`.`stations_id` = ' . addbackticks($this->name()) . '.`id`)';

        $result = mysql_query($query) or trigger_error('MySQL ERROR (' . mysql_errno() . '): ' . mysql_error());

        $results = array();
        while ($res = mysql_fetch_assoc($result)) {
            $results[] = $res;
        }


        $results = $this->normalize($results);

        return $results;
    }
}
?>
