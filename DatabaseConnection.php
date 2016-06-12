<?php
        define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', 'root');
	define('DATABASE', 'dad');
class DatabaseConnection {
    
    private $connection;
            
	function connect() {
            $this->connection = NULL;
            try {
                $this->connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            return $this->connection;          
	}	
}
?><?php



