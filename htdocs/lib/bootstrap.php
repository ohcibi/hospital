<?php
ini_set('error_reporting', E_ALL);
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
    if (strstr($value, '.')) {
        $value = explode('.', $value);
        if (strstr($value[1], ' ')) {
            $value[1] = explode(' ', $value[1]);
            $value[1] = addbackticks($value[1][0]) . ' ' . $value[1][1];
        } else {
            $value[1] = addbackticks($value[1]);
        }
        return addbackticks($value[0]) . '.' . $value[1];
    }

    return '`' . $value . '`';
}
function addnormalticks($value) {
    return "'" . $value . "'";
}


/**
 * Creates a string url from an array
 */
function url($text, $url = null) {
    $webroot = preg_replace('#([^/])$#', '$1/', dirname($_SERVER['SCRIPT_NAME']));

    if (empty($url) || (!is_string($url) && empty($url['controller']) && empty($url['action']))) {
        $url = $text;
    }

    if (is_string($url) && preg_match('#^/#', $url)) {
        $strUrl = $webroot . preg_replace('#^/#', '', $url);
    } else {

        $strUrl = $webroot . 'index.php';
        if (is_array($url) && !empty($url['controller']) && !empty($url['action'])) {
            $strUrl .= '?controller=' . $url['controller'] . '&' . 'action=' . $url['action'];
            unset($url['controller'], $url['action']);
        }
    }

    if (is_array($url)) {
        $count = count($url);
        for ($i = 0; $i < $count; $i++) {
            if (null !== $url[$i]) {
                $strUrl .= '&' . $i . '=' . $url[$i];
            }
        }
    }

    return $strUrl;
}

function uuid() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function makedate($data) {
    return $data['year'] . '-' . $data['month'] . '-' . $data['day'];
}

uses('core');
?>
