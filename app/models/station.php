<?php
class Station extends AppModel {

	var $name = 'Station';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Room' => array(
			'className' => 'Room',
			'foreignKey' => 'station_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>