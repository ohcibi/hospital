<?php
class Disease extends AppModel {

	var $name = 'Disease';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Diagnosis' => array(
			'className' => 'Diagnosis',
			'foreignKey' => 'disease_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Therapy' => array(
			'className' => 'Therapy',
			'foreignKey' => 'disease_id',
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

	var $hasAndBelongsToMany = array(
		'Symptom' => array(
			'className' => 'Symptom',
			'joinTable' => 'diseases_symptoms',
			'foreignKey' => 'disease_id',
			'associationForeignKey' => 'symptom_id',
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