<?php
class SpecialField extends AppModel {

	var $name = 'SpecialField';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Doctor' => array(
			'className' => 'Doctor',
			'foreignKey' => 'special_field_id',
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