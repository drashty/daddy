<?php

include 'DatabaseConnection.php';
include 'CompanyModel.php';

class CompanyTableOperation {

    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
            $companyModelObject = new CompanyModel($data);
            $sql = "INSERT INTO company(c_code, c_name, c_group, c_favorite) VALUES (?, ?, ?, ?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                print_r($companyModelObject);
                $stmt->bind_param("ssss", $companyModelObject->code, $companyModelObject->name, $companyModelObject->group, $companyModelObject->favorite);
                $stmt->execute();
                echo 'INSERT QUERY';
            } else {
                echo mysqli_error($this->mysqli);
            }
        } else {
            echo 'NO Connection';
        }
    }

    function updateFavorite($id, $isFavorite) {
        $sql = "UPDATE company SET c_favorite = '$isFavorite' WHERE c_code= '$id'";
        $this->mysqli->query($sql);
    }

    function read() {
        if ($this->mysqli != NULL) {
            $sql = "SELECT * FROM company";
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
            $sql = "DELETE FROM company where c_code=$id";
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
