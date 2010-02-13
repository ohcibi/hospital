<?php
class HtmlHelper {

    function link($text, $url = array(), $attributes = array()) {
        $webroot = preg_replace('#([^/])$#', '$1/', dirname($_SERVER['SCRIPT_NAME']));

        if (empty($url) || (empty($url['controller']) && empty($url['action']))) {
            $url = $text;
        }

        if (!empty($url['controller']) && !empty($url['action'])) {
            $url = $webroot . $url['controller'] . '/' . $url['action'];
        }

        $arrStrAttributes = array();
        foreach ($attributes as $key => $value) {
            $arrStrAttributes[] = $key . '="' . $value . '"';
        }

        $strAttributes = '';
        $strAttributes = join(' ', $arrStrAttributes);
        if (!empty($strAttributes)) {
            $strAttributes = ' ' . $strAttributes;
        }
        
        return '<a href="' . $url . '"' . $strAttributes . '>' . $text . '</a>'; 
    }
}
