<?php
class Db {
    /**
     * The connection ressource for the mysql connection
     */
    var $connection = null;

    /**
     * The default database host
     */
    var $host = 'localhost';
    
    /**
     * The default database username
     */
    var $username = 'root';
    
    /**
     * The default database password
     */
    var $password = '';

    /**
     * The default database name
     */
    var $dbname = 'database';

    /**
     * The default database prefix
     */
    var $dbprefix = '';


    function Db($db_config = array()) {
        foreach ($db_config as $var => $value) {
            $this->{$var} = $value;
        }
    }


    function connect() {
        $this->connection = mysql_pconnect($this->host, $this->username, $this->password);
        mysql_select_db($this->dbname);
    }
}
?>
