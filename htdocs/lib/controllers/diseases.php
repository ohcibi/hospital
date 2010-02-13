<?php
class DiseasesController extends Controller {
    var $name = 'Diseases';

    var $helpers = array('Html');

    function index() {
        $diseases = $this->Diseases->findAllWithSymptoms();

        $this->set(compact('diseases'));
    }
}
?>
