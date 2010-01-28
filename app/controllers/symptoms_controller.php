<?php
class SymptomsController extends AppController {

	var $name = 'Symptoms';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Symptom->recursive = 0;
		$this->set('symptoms', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Symptom.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('symptom', $this->Symptom->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Symptom->create();
			if ($this->Symptom->save($this->data)) {
				$this->Session->setFlash(__('The Symptom has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Symptom could not be saved. Please, try again.', true));
			}
		}
		$diseases = $this->Symptom->Disease->find('list');
		$this->set(compact('diseases'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Symptom', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Symptom->save($this->data)) {
				$this->Session->setFlash(__('The Symptom has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Symptom could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Symptom->read(null, $id);
		}
		$diseases = $this->Symptom->Disease->find('list');
		$this->set(compact('diseases'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Symptom', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Symptom->del($id)) {
			$this->Session->setFlash(__('Symptom deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>