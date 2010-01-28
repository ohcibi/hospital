<?php
class Symptom extends AppModel {

	var $name = 'Symptom';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Disease' => array(
			'className' => 'Disease',
			'joinTable' => 'diseases_symptoms',
			'foreignKey' => 'symptom_id',
			'associationForeignKey' => 'disease_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>