<?php
class Round extends AppModel {

	var $name = 'Round';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Doctor' => array(
			'className' => 'Doctor',
			'foreignKey' => 'doctor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Therapy' => array(
			'className' => 'Therapy',
			'foreignKey' => 'therapy_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>