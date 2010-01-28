<?php
class TherapiesController extends AppController {

	var $name = 'Therapies';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Therapy->recursive = 0;
		$this->set('therapies', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Therapy.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('therapy', $this->Therapy->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Therapy->create();
			if ($this->Therapy->save($this->data)) {
				$this->Session->setFlash(__('The Therapy has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Therapy could not be saved. Please, try again.', true));
			}
		}
		$patients = $this->Therapy->Patient->find('list');
		$doctors = $this->Therapy->Doctor->find('list');
		$diseases = $this->Therapy->Disease->find('list');
		$diagnoses = $this->Therapy->Diagnose->find('list');
		$rooms = $this->Therapy->Room->find('list');
		$this->set(compact('patients', 'doctors', 'diseases', 'diagnoses', 'rooms'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Therapy', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Therapy->save($this->data)) {
				$this->Session->setFlash(__('The Therapy has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Therapy could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Therapy->read(null, $id);
		}
		$patients = $this->Therapy->Patient->find('list');
		$doctors = $this->Therapy->Doctor->find('list');
		$diseases = $this->Therapy->Disease->find('list');
		$diagnoses = $this->Therapy->Diagnose->find('list');
		$rooms = $this->Therapy->Room->find('list');
		$this->set(compact('patients','doctors','diseases','diagnoses','rooms'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Therapy', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Therapy->del($id)) {
			$this->Session->setFlash(__('Therapy deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>