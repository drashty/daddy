<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'DatabaseConnection.php';
include 'GroupModel.php';

class GroupTableOperation {

    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
            $groupModelObject = new GroupModel($data);
            $sql = "INSERT INTO c_group(g_name) VALUES (?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                print_r($groupModelObject);
                $stmt->bind_param("s", $groupModelObject->name);
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

    function delete($id) {
        if ($this->mysqli != NULL) {
            $sql = "DELETE FROM c_group where g_id=$id";
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
