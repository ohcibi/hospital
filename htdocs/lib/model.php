<?php
class Model {
    var $schema = array();

    /**
     * Array of all associated models
     */
    var $associated = array();

    function __construct() {
        $query = 'DESCRIBE ' . addbackticks(strtolower($this->name()));
        $results = mysql_query($query) or trigger_error('MySQL ERROR (' . mysql_errno() . '): ' . mysql_error());

        $schema = array();
        while($result = mysql_fetch_assoc($results)) {
            $schema[] = $this->name() . '.' . $result['Field'];
        }

        foreach ($this->associated as $assoc) {
            uses('models/' . strtolower($assoc));
            $className = $assoc . 'Model';
            $this->{$assoc} = new $className();
        }

        $this->schema = $schema;
    }

    function save($data) {
        if (array_key_exists('id', $data[$this->name()])) {
            $conditions = array($this->name() . '.id' => $data[$this->name()]['id']);
            return $this->update($data[$this->name()], $conditions);
        }

        return $this->create($data[$this->name()]);
    }

    /**
     * The 'C' in CRUD
     */
    function create($data) {
        $tablename = strtolower($this->name());
        $keys = array_keys($data);
        $values = array_values($data);

        $keys = array_map('addbackticks', $keys);
        $values = array_map('addnormalticks', $values);

        $query = "INSERT INTO `" . $tablename . "` (" . join(', ', $keys) . ") VALUES (" . join(', ', $values) . ")";
        $success = mysql_query($query);
        if (!$success) {
            trigger_error(__FILE__ . ':' . __LINE__ . ' ' . mysql_error() . "<br />\n" . $query, E_USER_WARNING);
            return false;
        }
        return true;
    }

    function selectFields($fields = array()) {
        $selectFields = $this->schema;
        if (!empty($fields)) {
            foreach ($fields as $field) {
                if (!strstr($field, '.')) {
                    $field = $this->name() . '.' . $field;
                }
                $selectFields[] = $field;
            }

            $fields = array_intersect($this->schema, $selectFields);
        }

        reset($fields);

        while (list($key, $value) = each($fields)) {
            $field = explode('.', $value);
            $fields[$key] = addbackticks($field[0]) . '.' . addbackticks($field[1]) . ' AS `' . $value . '`';
        }

        return join(', ', $fields);
    }


    /**
     * Returns name of the model
     */
    function name() {
        return str_replace('Model', '', get_class($this));
    }

    function findList() {
        $fields = array($this->name() . '.id', $this->name() . '.title');
        $fields = $this->selectFields($fields);
        $query = 'SELECT ' . $fields . ' FROM ' . addbackticks(strtolower($this->name())) . ' AS ' . addbackticks($this->name());

        return $this->query($query);
    }

    /**
     * Executes MySQL-Query and returns normalized Array
     */
    function query($query) {
        $result = mysql_query($query) or trigger_error('MySQL ERROR (' . mysql_errno() . '): ' . mysql_error());

        $results = array();
        while ($res = mysql_fetch_assoc($result)) {
            $results[] = $res;
        }

        $returnResults = array();
        foreach($results as $key => $value) {
            foreach ($value as $k => $v) {
                $k = explode('.', $k);
                $returnResults[$key][$k[0]][$k[1]] = $v;
            }
        }

        return $returnResults;
    }

    /**
     * Gets Id of last inserted record.
     */
    function getLastInsertId() {
        return mysql_insert_id();
    }

    function normalize($data) {
        $results = array();
        foreach($data as $key => $value) {
            foreach ($value as $k => $v) {
                $k = explode('.', $k);
                $results[$key][$k[0]][$k[1]] = $v;
            }
        }

        return $results;
    }
}
?>
