<?php
function uses() {
    $args = func_get_args();
    foreach ($args as $file) {
        require_once(CORE_LIB_PATH . strtolower($file) . '.php');
    }
}

function debug($var) {
    $calledFrom = debug_backtrace();
    echo '<strong>' . str_replace(CORE_PATH, '', $calledFrom[0]['file']) . '</strong>';
    echo ' (line <strong>' . $calledFrom[0]['line'] . '</strong>)';
    $output = print_r($var, true);
    echo "\n<pre>\n";
    echo $output;
    echo "\n</pre>\n";
}


function addbackticks($value) {
    return '`' . $value . '`';
}
function addnormalticks($value) {
    return "'" . $value . "'";
}

uses('core');
?>
