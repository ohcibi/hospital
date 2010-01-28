<?php
class DiseasesController extends AppController {

	var $name = 'Diseases';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Disease->recursive = 0;
		$this->set('diseases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Disease.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('disease', $this->Disease->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Disease->create();
			if ($this->Disease->save($this->data)) {
				$this->Session->setFlash(__('The Disease has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Disease could not be saved. Please, try again.', true));
			}
		}
		$symptoms = $this->Disease->Symptom->find('list');
		$this->set(compact('symptoms'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Disease', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Disease->save($this->data)) {
				$this->Session->setFlash(__('The Disease has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Disease could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Disease->read(null, $id);
		}
		$symptoms = $this->Disease->Symptom->find('list');
		$this->set(compact('symptoms'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Disease', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Disease->del($id)) {
			$this->Session->setFlash(__('Disease deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>