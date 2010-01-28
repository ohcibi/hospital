<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2010-01-28 21:01:37 : 1264708837*/
class AppSchema extends CakeSchema {
	var $name = 'App';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $diagnoses = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'doctor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'created' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'disease_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'ArztID' => array('column' => 'doctor_id', 'unique' => 0), 'PatientID' => array('column' => 'patient_id', 'unique' => 0))
	);
	var $diseases = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'description' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $diseases_symptoms = array(
		'symptom_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'disease_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'indexes' => array('PRIMARY' => array('column' => array('symptom_id', 'disease_id'), 'unique' => 1))
	);
	var $doctors = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'special_field_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $patients = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'birth_day' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'gender' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1),
		'size' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $rooms = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'station_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $rounds = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'doctor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'therapy_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'temperature' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 2),
		'weight' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'pulse' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3),
		'blood_pressure_systolic' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3),
		'blood_pressure_diastolic' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'PatientID' => array('column' => 'patient_id', 'unique' => 0), 'ArztID' => array('column' => 'doctor_id', 'unique' => 0))
	);
	var $special_fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $stations = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $symptoms = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $therapies = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'patient_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'doctor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'disease_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'diagnose_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'room_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'PatientID' => array('column' => 'patient_id', 'unique' => 0), 'ArztID' => array('column' => 'doctor_id', 'unique' => 0), 'DiagnoseID' => array('column' => 'disease_id', 'unique' => 0))
	);
}
?>