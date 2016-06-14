<?php
        define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', 'root');
	define('DATABASE', 'dad');
class DatabaseConnection {
    
    static private $connection;
            
	function connect() {
            if ($this->connection == NULL) {
                
            try {
                $this->connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            }
            
            return $this->connection;          
	}	
}
?><?php



