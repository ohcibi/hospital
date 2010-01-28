<?php
class RoundsController extends AppController {

	var $name = 'Rounds';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Round->recursive = 0;
		$this->set('rounds', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Round.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('round', $this->Round->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Round->create();
			if ($this->Round->save($this->data)) {
				$this->Session->setFlash(__('The Round has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Round could not be saved. Please, try again.', true));
			}
		}
		$patients = $this->Round->Patient->find('list');
		$doctors = $this->Round->Doctor->find('list');
		$therapies = $this->Round->Therapy->find('list');
		$this->set(compact('patients', 'doctors', 'therapies'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Round', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Round->save($this->data)) {
				$this->Session->setFlash(__('The Round has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Round could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Round->read(null, $id);
		}
		$patients = $this->Round->Patient->find('list');
		$doctors = $this->Round->Doctor->find('list');
		$therapies = $this->Round->Therapy->find('list');
		$this->set(compact('patients','doctors','therapies'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Round', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Round->del($id)) {
			$this->Session->setFlash(__('Round deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>