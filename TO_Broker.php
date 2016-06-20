<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'DatabaseConnection.php';
include_once 'ModelBroker.php';

class TO_Broker {

    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
            $brokerModelObject = new ModelBroker($data);
            $sql = "INSERT INTO broker(b_name) VALUES (?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param("s", $brokerModelObject->name);
                $stmt->execute();
                echo 'INSERT QUERY';
            } else {
                echo mysqli_error($this->mysqli);
                print_r(mysqli_error($this->mysqli));
            }
        } else {
            echo 'NO Connection';
        }
    }

    function read() {
        if ($this->mysqli != NULL) {
            $sql = "SELECT * FROM broker";
            $result = $this->mysqli->query($sql);
            $rows = Array();
            while ($row = $result->fetch_object()) {
                $rows[] = $row;
            }
            return $rows;
        }
    }
    
    function updateBrokerName($data) {
        if ($this->mysqli != NULL) {
            $brokerModelObject = new ModelBroker($data);
            $sql = "UPDATE broker SET b_name = '$brokerModelObject->name' WHERE b_id= '$brokerModelObject->id'";
            echo $sql;
            $this->mysqli->query($sql);
        }
    }
    
    public function __construct() {
        $conn = new DatabaseConnection();
        $this->mysqli = $conn->connect();
    }

    public function __destruct() {
        $this->mysqli = NULL;
    }

}
