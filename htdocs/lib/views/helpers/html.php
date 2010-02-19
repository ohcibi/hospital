<?php
class HtmlHelper extends Helper {
    /**
     * array of params
     */
    var $params = array();
    function css($name) {
        $url = url('/css/' . $name . '.css');
        return '<style type="text/css">@import url(' . $url .  ');</style>';
    }

    function link($text, $url = array(), $attributes = array(), $confirm = null) {
        $url = url($text, $url);

        $arrStrAttributes = array();
        foreach ($attributes as $key => $value) {
            $arrStrAttributes[] = $key . '="' . $value . '"';
        }

        $strAttributes = '';
        $strAttributes = join(' ', $arrStrAttributes);
        if (!empty($strAttributes)) {
            $strAttributes = ' ' . $strAttributes;
        }

        if (!empty($confirm)) {
            $confirm = ' onclick="return confirm(\'' . $confirm . '\');"';
        }
        
        return '<a href="' . $url . '"' . $strAttributes . $confirm . '>' . $text . '</a>'; 
    }

    function form($options = array()) {
        $defaults = array(
            'url' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $url = url(null, $url);

        return '<form action="' . $url . '" method="post">';
    }

    function datetime($name, $options = array()) {
        $defaults = array(
            'selected' => '0000-00-00'
        );
        $options = array_merge($defaults, $options);
        extract($options);

        if (!strstr($name, '.')) {
            $name = $this->params['controller'] . '.' . $name;
        }

        $name = explode('.', $name);

        $selected = explode('-', $selected);

        $days = range(1, 31);
        $months = range(1, 12);
        $years = range(1900, date('Y'));

        $out = '<select name="data[' . $name[0] . '][' . $name[1] . '][day]">';
        foreach ($days as $day) {
            $strSelected = '';
            if ($day == $selected[2]) {
                $strSelected = ' selected="selected"';
            }
            $day = sprintf('%02d', $day);
            $out .= '<option value="' . $day . '"' . $strSelected . '>' . $day . '</option>';
        }
        $out .= '</select>.';
        
        $out .= '<select name="data[' . $name[0] . '][' . $name[1] . '][month]">';
        foreach ($months as $month) {
            $strSelected = '';
            if ($month == $selected[1]) {
                $strSelected = ' selected="selected"';
            }
            $month = sprintf('%02d', $month);
            $out .= '<option value="' . $month . '"' . $strSelected . '>' . $month . '</option>';
        }
        $out .= '</select>.';

        $out .= '<select name="data[' . $name[0] . '][' . $name[1] . '][year]">';
        foreach ($years as $year) {
            $strSelected = '';
            if ($year == $selected[0]) {
                $strSelected = ' selected="selected"';
            }
            $year = sprintf('%04d', $year);
            $out .= '<option value="' . $year . '"' . $strSelected . '>' . $year . '</option>';
        }
        $out .= '</select>';

        return $out;
    }
}
?>
