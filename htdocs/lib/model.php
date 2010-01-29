<?php
class Model {

    function save($data) {
        //debug($data); die();
        if (array_key_exists('id', $data[$this->name])) {
            $conditions = array($this->name . '.id' => $data[$this->name]['id']);
            return $this->update($data[$this->name], $conditions);
        }

        return $this->create($data[$this->name]);
    }

    /**
     * The 'C' in CRUD
     */
    function create($data) {
        $tablename = strtolower($this->name);
        $keys = array_keys($data);
        $values = array_values($data);

        $keys = array_map('addbackticks', $keys);
        $values = array_map('addnormalticks', $values);

        $query = "INSERT INTO `" . $tablename . "` (" . join(', ', $keys) . ") VALUES (" . join(', ', $values) . ")";
        mysql_query($query) or die(__FILE__ . ':' . __LINE__ . ' ' . mysql_error() . "<br />\n" . $query);
    }
}
?>
