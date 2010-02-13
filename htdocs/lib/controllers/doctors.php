<?php
class DoctorsController extends Controller {
    var $name = 'Doctors';

    var $helpers = array('Html');

    function index($name = null) {
        $doctors = $this->Doctors->findAllWithSpecial();

        $this->set(compact('doctors'));
    }
}
?>
