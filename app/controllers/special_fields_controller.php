<?php
class SpecialFieldsController extends AppController {

	var $name = 'SpecialFields';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->SpecialField->recursive = 0;
		$this->set('specialFields', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid SpecialField.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('specialField', $this->SpecialField->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SpecialField->create();
			if ($this->SpecialField->save($this->data)) {
				$this->Session->setFlash(__('The SpecialField has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The SpecialField could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid SpecialField', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->SpecialField->save($this->data)) {
				$this->Session->setFlash(__('The SpecialField has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The SpecialField could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SpecialField->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for SpecialField', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SpecialField->del($id)) {
			$this->Session->setFlash(__('SpecialField deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>