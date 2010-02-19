<?php
class RoomsModel extends Model {
    var $name = 'Rooms';

    var $associated = array('Stations', 'Patients');

    function findByStation($stationid, $options = array()) {
        $defaults = array(
            'fields' => array(),
            'order' => 'Rooms.id',
            'conditions' => array('Rooms.stations_id' => $stationid),
        );
        $options = array_merge($defaults, $options);

        return $this->query($this->makeQuery($options));
    }
}
?>
