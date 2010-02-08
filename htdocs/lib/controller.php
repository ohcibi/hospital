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

    /**
     * Array of all the params
     */
    var $params = array();

    function set() {
        $args = func_get_args();
        if (is_array($args[0])) {
            foreach ($args[0] as $key => $var) {
                $this->viewVars[$key] = $var;
            }
        } elseif (is_string($args[0]) && isset($args[1])) {
            $this->viewVars[$args[0]] = $args[1];
        }
    }


    function renderAction($action = null, $params = array()) {
        if (!method_exists($this, $action)) {
            return false;
        }

        $globalParams = array(
            'request' => array(
                'controller' => strtolower($this->name()),
                'action' => strtolower($action)
            )
        );


        call_user_func_array(array($this, $action), $params);

        $content_for_layout = $this->getViewContents($action, $this->viewVars);
        return $content_for_layout;
    }

    /**
     * Returns the name of the controller
     */
    function name() {
        return str_replace('Controller', '', get_class($this));
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

    /**
     * Redirect to specified url
     */
    function redirect($url) {
        $url = str_replace(strtolower($this->name()) . '/', '', $url);
        header('Location: ' . $url);
    }

    /**
     * Sets Flash message
     */
    function setFlash($message, $class = null) {
        $reqid = $_SERVER['UNIQUE_ID'];
        $_SESSION['Flash'] = compact('message', 'class', 'reqid');
    }

    function __destruct() {
        if ($_SESSION['Flash']['reqid'] != $_SERVER['UNIQUE_ID']) {
            unset($_SESSION['Flash']);
        }
    }
}
?>
