<?php
class DiagnosesController extends AppController {

	var $name = 'Diagnoses';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Diagnosis->recursive = 0;
		$this->set('diagnoses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Diagnosis.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('diagnosis', $this->Diagnosis->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Diagnosis->create();
			if ($this->Diagnosis->save($this->data)) {
				$this->Session->setFlash(__('The Diagnosis has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Diagnosis could not be saved. Please, try again.', true));
			}
		}
		$doctors = $this->Diagnosis->Doctor->find('list');
		$patients = $this->Diagnosis->Patient->find('list');
		$diseases = $this->Diagnosis->Disease->find('list');
		$this->set(compact('doctors', 'patients', 'diseases'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Diagnosis', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Diagnosis->save($this->data)) {
				$this->Session->setFlash(__('The Diagnosis has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Diagnosis could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Diagnosis->read(null, $id);
		}
		$doctors = $this->Diagnosis->Doctor->find('list');
		$patients = $this->Diagnosis->Patient->find('list');
		$diseases = $this->Diagnosis->Disease->find('list');
		$this->set(compact('doctors','patients','diseases'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Diagnosis', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Diagnosis->del($id)) {
			$this->Session->setFlash(__('Diagnosis deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>