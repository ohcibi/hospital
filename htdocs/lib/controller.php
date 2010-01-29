<?php
class Controller {
    /**
     * Array that holds all the variables, that should be available in view.
     */
    var $viewVars = array();
   
    /**
     * Array of posted data.
     */
    var $data = array();

    function set($data = array()) {
        foreach ($data as $key => $var) {
            $this->viewVars[$key] = $var;
        }
    }


    function renderAction($action = null, $params = array()) {
        if (!method_exists($this, $action)) {
            return false;
        }

        call_user_func_array(array($this, $action), $params);

        $content_for_layout = $this->getViewContents($action, $this->viewVars);
        return $content_for_layout;
    }

    function renderLayout($content_for_layout = null) {
        $layoutVars = array_merge($this->viewVars, compact('content_for_layout'));
        $output = $this->getLayoutContents($layoutVars);
        return $output;
    }

    function getViewContents($view, $varscope = array()) {
        $viewFile = CORE_LIB_PATH . 'views/' . strtolower($this->name) . '/' . $view . '.php';
        return $this->getFileContents($viewFile, $varscope);
    }
    function getLayoutContents($varscope = array()) {
        $viewFile = CORE_LIB_PATH . 'views/layout.php';
        return $this->getFileContents($viewFile, $varscope);
    }

    function getFileContents($file, $varscope = array()) {
        if (is_file($file)) {
            extract($varscope);
            ob_start();
            include($file);
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        return false;
    }
}
?>
