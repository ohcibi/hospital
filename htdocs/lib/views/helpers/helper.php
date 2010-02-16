<?php
class Helper {
    function url($text, $url) {
        $webroot = preg_replace('#([^/])$#', '$1/', dirname($_SERVER['SCRIPT_NAME']));

        if (empty($url) || (empty($url['controller']) && empty($url['action']))) {
            $url = $text;
        }

        if (!empty($url['controller']) && !empty($url['action'])) {
            $url = $webroot . $url['controller'] . '/' . $url['action'];
        }

        return $url;
    }
}
