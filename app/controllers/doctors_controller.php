<?php
class DoctorsController extends AppController {

	var $name = 'Doctors';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Doctor->recursive = 0;
		$this->set('doctors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Doctor.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('doctor', $this->Doctor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Doctor->create();
			if ($this->Doctor->save($this->data)) {
				$this->Session->setFlash(__('The Doctor has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Doctor could not be saved. Please, try again.', true));
			}
		}
		$specialFields = $this->Doctor->SpecialField->find('list');
		$this->set(compact('specialFields'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Doctor', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Doctor->save($this->data)) {
				$this->Session->setFlash(__('The Doctor has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Doctor could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Doctor->read(null, $id);
		}
		$specialFields = $this->Doctor->SpecialField->find('list');
		$this->set(compact('specialFields'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Doctor', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Doctor->del($id)) {
			$this->Session->setFlash(__('Doctor deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>