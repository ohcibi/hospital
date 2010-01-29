<?php
class DoctorsController extends Controller {
    var $name = 'Doctors';

    function index($name = null) {
        if (null === $name) {
            $name = 'Du hast deinen Namen nicht angegeben.';
        }
        $this->set(compact('name'));
    }
}
?>
