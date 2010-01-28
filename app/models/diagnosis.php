<?php
class Diagnosis extends AppModel {

	var $name = 'Diagnosis';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Doctor' => array(
			'className' => 'Doctor',
			'foreignKey' => 'doctor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Disease' => array(
			'className' => 'Disease',
			'foreignKey' => 'disease_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>