<?php
class Model {
    var $schema = array();

    /**
     * Array of all associated models
     */
    var $associated = array();

    function __construct($parent = null) {
        $query = 'DESCRIBE ' . addbackticks(strtolower($this->name()));
        $results = mysql_query($query) or trigger_error('MySQL ERROR (' . mysql_errno() . '): ' . mysql_error());

        $schema = array();
        while($result = mysql_fetch_assoc($results)) {
            $schema[] = $this->name() . '.' . $result['Field'];
        }

        foreach ($this->associated as $assoc) {
            if ($assoc == $parent) {
                continue;
            }

            uses('models/' . strtolower($assoc));
            $className = $assoc . 'Model';
            $this->{$assoc} = new $className($this->name());
        }

        $this->schema = $schema;
    }

    function save($data) {
        if (array_key_exists('id', $data[$this->name()])) {
            $conditions = array($this->name() . '.id' => $data[$this->name()]['id']);
            return $this->update($data[$this->name()], compact('conditions'));
        }

        return $this->create($data[$this->name()]);
    }

    /**
     * The 'C' in CRUD
     */
    function create($data) {
        $fields = $data;
        try {
            $query = $this->makeQuery(compact('fields'), 'insert');
        } catch(InvalidArgumentException $e) {
            trigger_error("Invalid statement type: <br />\n" . nl2br($e->getTraceAsString()), E_USER_ERROR);
        }

        $success = mysql_query($query);
        if (!$success) {
            trigger_error(__FILE__ . ':' . __LINE__ . ' ' . mysql_error() . "<br />\n" . $query, E_USER_WARNING);
            return false;
        }
        return true;
    }

    /**
     * The 'U' in CRUD
     */
    function update($data, $options = array()) {
        $defaults = array(
            'conditions' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $fields = $data;
        try {
            $query = $this->makeQuery(compact('fields', 'conditions'), 'update');
        } catch(InvalidArgumentException $e) {
            trigger_error("Invalid statement type: <br />\n" . nl2br($e->getTraceAsString()), E_USER_ERROR);
        }

        $success = mysql_query($query);
        if (!$success) {
            trigger_error(__FILE__ . ':' . __LINE__ . ' ' . mysql_error() . "<br />\n" . $query, E_USER_WARNING);
            return false;
        }
        return true;
    }

    /**
     * The 'D' in CRUD
     */
    function delete($id, $options = array()) {
        $defaults = array(
            'conditions' => array()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        if (empty($conditions)) {
            $conditions[$this->name() . '.id'] = $id;
        }

        try {
            $query = $this->makeQuery(compact('conditions'), 'delete');
        } catch(InvalidArgumentException $e) {
            trigger_error("Invalid statement type: <br />\n" . nl2br($e->getTraceAsString()), E_USER_ERROR);
        }
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
            $selectFields = array();
            foreach ($fields as $field) {
                if (!strstr($field, '.')) {
                    $field = $this->name() . '.' . $field;
                }
                $selectFields[] = $field;
            }
        }

        reset($selectFields);

        while (list($key, $value) = each($selectFields)) {
            $selectFields[$key] = addbackticks($value) . ' AS `' . $value . '`';
        }

        return join(', ', $selectFields);
    }


    /**
     * Returns name of the model
     */
    function name() {
        return str_replace('Model', '', get_class($this));
    }


    /**
     * Finds all entrys by given conditions
     */
    function findAll($options = array()) {
        $defaults = array(
            'conditions' => array(),
            'order' => array(),
            'fields' => array(),
            'joins' => array(),
            'limit' => null,
            'page' => null
        );
        $options = array_merge($defaults, $options);
        extract($options);

        try {
            $query = $this->makeQuery(compact('conditions', 'order', 'fields', 'joins', 'limit', 'page'));
        } catch(InvalidArgumentException $e) {
            trigger_error("Invalid statement type: <br />\n" . nl2br($e->getTraceAsString()), E_USER_ERROR);
        }

        return $this->query($query);
    }
    function findList($options = array()) {
        $defaults = array(
            'fields' => array($this->name() . '.id', $this->name() . '.title'),
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $query = $this->makeQuery(compact('fields'));

        return $this->query($query);
    }

    /**
     * Finds first element of a query
     */
    function findFirst($options = array()) {
        $defaults = array(
            'conditions' => array(),
            'fields' => array(),
            'joins' => array(),
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $limit = 1;

        try {
            $query = $this->makeQuery(compact('conditions', 'limit', 'fields', 'joins'));
        } catch(InvalidArgumentException $e) {
            trigger_error("Invalid statement type: <br />\n" . nl2br($e->getTraceAsString()), E_USER_ERROR);
        }

        $result = $this->query($query);
        if (false === $result) {
            return false;
        }
        return $result[0];
    }
    /**
     * Generates query from given params
     * @param $options array of options
     * @param $type = 'select' type of sql statement
     *
     * throws InvalidArgumentException if type is not valid
     */
    function makeQuery($options = array(), $type = 'select') {
        $defaults = array(
            'conditions' => array(),
            'fields' => array(),
            'limit' => null,
            'table' => $this->name()
        );
        $options = array_merge($defaults, $options);
        extract($options);

        $types = array('select', 'insert', 'update', 'delete');
        if (!in_array($type, $types)) {
            throw new InvalidArgumentException();
        }

        $table = strtolower($table);
        $alias = '';
        if ($type != 'insert' && $type != 'delete') {
            $alias = ' AS ' . addbackticks(ucfirst($table));
        }
        $table = addbackticks($table) . $alias;

        $query = strtoupper($type) . ' ';

        if ($type == 'insert' || $type == 'update') {
            $keys = array_map('addbackticks', array_keys($fields));
            $values = array_map('addnormalticks', array_values($fields));
        }
        switch($type) {
        /**
         * in case of an insert we just have to create our query and finish the game
         */
        case 'insert':
            $query .= 'INTO ' . $table . ' ';
            $query .= '(' . join(', ', $keys) . ') VALUES (' . join(', ', $values) . ')';
            return $query;
            
        case 'delete':
            $query .= 'FROM ' . $table;
            break;

        case 'select':
            $query .= $this->selectFields($fields) . ' FROM ' . $table;
            break;

        case 'update':
            $query .= $table;
            break;
        }

        if (!empty($joins) && ($type == 'update' || $type == 'select')) {
            foreach ($joins as $joint) {
                $query .= ' ' . strtoupper($joint['type']) . ' JOIN ' . addbackticks($joint['table']) . ' AS ' . addbackticks($joint['alias']) . ' ON (' . $this->makeJoinConditions($joint['conditions']) . ')';
            }
        }
        
        if ($type == 'update') {
            $query .= ' SET ';
            $count = count($keys);
            $arrQuery = array();
            for ($i = 0; $i < $count; $i++) {
                $arrQuery[] = $keys[$i] . '=' . $values[$i];
            }
            $query .= join(', ', $arrQuery);
        }

        if (!empty($conditions) && is_array($conditions)) {
            $delete = false;
            if ($type == 'delete') {
                $delete = true;
            }

            $query .= ' WHERE' . $this->makeConditions($conditions, $delete);
        }

        if (!empty($order)) {
            if (is_string($order)) {
                $order = array($order);
            }

            $order = array_map('addbackticks', $order);
            $query .= ' ORDER BY ' . join(', ', $order);
        }

        if (!empty($limit) && is_int($limit)) {
            $query .= ' LIMIT ';
            if (!empty($page) && is_int($page)) {
                $query .= (($page-1)*$limit) . ', ';
            }
            $query .= $limit;
        }

        return $query;
    }
  
    /**
     * Generates conditions string for WHERE statement
     */
    function makeConditions($conditions = array(), $delete = false) {
        $cond = array();
        foreach ($conditions as $key => $value) {
            $op = '=';
            if ($value === null) {
                $value = 'NULL';
                $op = 'IS';
            }
            if (strstr($key, ' ')) {
                $key = explode(' ', $key);
                $op = $key[1];
                $key = $key[0];
            }

            if (!strstr($key, '.')) {
                $key = $this->name() . '.' . $key;
            }

            if ($delete !== false) {
                $key = explode('.', $key);
                $key = strtolower($key[0]) . '.' . $key[1];
            }

            $key = addbackticks($key);
            $value = addnormalticks($value);

            $cond[] = $key . ' ' . $op . ' ' . $value;
        }

        return ' ' . join(' AND ', $cond);
    }

    /**
     * Generates conditions string for JOIN statement
     */
    function makeJoinConditions($conditions) {
        $cond = array();
        foreach ($conditions as $condition) {
            $condition = explode('=', $condition);
            $cond[] = addbackticks(trim($condition[0])) . ' = ' . addbackticks(trim($condition[1]));
        }

        return join(' AND ', $cond);
    }
    /**
     * Executes MySQL-Query and returns normalized Array
     */
    function query($query) {
        $result = mysql_query($query) or trigger_error('MySQL ERROR (' . mysql_errno() . '): ' . mysql_error() . '<br />' . $query, E_USER_WARNING);

        $results = array();
        while ($res = mysql_fetch_assoc($result)) {
            $results[] = $res;
        }

        if (empty($results)) {
            return false;
        }

        return $this->normalize($results);
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
