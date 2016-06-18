<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'DatabaseConnection.php';
include_once 'ModelBank.php';

class TO_Bank {

    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
            $bankModelObject = new ModelBank($data);
            $sql = "INSERT INTO bank(b_name) VALUES (?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                print_r($bankModelObject);
                $stmt->bind_param("s", $bankModelObject->name);
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
            $sql = "SELECT * FROM c_group";
            $result = $this->mysqli->query($sql);
            $rows = Array();
            while ($row = $result->fetch_object()) {
                $rows[] = $row;
            }
            return $rows;
        }
    }

    function getGroupNameForId($id) {
        if ($this->mysqli != NULL) {
            $sql = "SELECT * FROM c_group where g_id = $id";
            $result = $this->mysqli->query($sql);
            $row = $result->fetch_object();
            return $row;
        }
    }

    function delete($id) {
        if ($this->mysqli != NULL) {
            $sql = "DELETE FROM c_group where g_id=$id";
            $this->mysqli->query($sql);
        }
    }

    function updateGroupName($data) {
        if ($this->mysqli != NULL) {
            $groupModelObject = new ModelGroup($data);
            $sql = "UPDATE c_group SET g_name = '$groupModelObject->name' WHERE g_id= '$groupModelObject->id'";
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
