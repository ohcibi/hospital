<?php
class DoctorsModel extends Model {

    var $associated = array('Specials');

    function findAllWithSpecial() {
        $joins = array(
            array(
                'table' => 'specials',
                'alias' => 'Specials',
                'type' => 'left',
                'conditions' => array('Specials.id = Doctors.specials_id')
            )
        );
        $fields = array('Doctors.id', 'Doctors.title', 'Doctors.first_name', 'Doctors.last_name', 'Specials.title');

        return $this->findAll(compact('joins', 'fields'));
    }
}
?>
