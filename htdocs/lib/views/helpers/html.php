<?php
class HtmlHelper extends Helper {
    function link($text, $url = array(), $attributes = array()) {
        $url = $this->url($text, $url);

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

    function form($options = array()) {
        $defaults = array(
            'url' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $url = $this->url(null, $url);

        return '<form action="' . $url . '" method="post">';
    }
}
?>
