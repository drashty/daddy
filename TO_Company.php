<?php

include_once 'DatabaseConnection.php';
include_once 'ModelCompany.php';

class TO_Company {

    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
            $companyModelObject = new ModelCompany($data);
            $sql = "INSERT INTO company(c_code, c_name, g_id, c_favorite) VALUES (?, ?, ?, ?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                print_r($companyModelObject);
                $stmt->bind_param("ssss", $companyModelObject->code, $companyModelObject->name, $companyModelObject->groupId, $companyModelObject->favorite);
                $stmt->execute();
                echo 'INSERT QUERY';
            } else {
                echo mysqli_error($this->mysqli);
            }
        } else {
            echo 'NO Connection';
        }
    }
    
    function updateCompanyDetails($data) {
        if ($this->mysqli != NULL) {
            $companyModelObject = new ModelCompany($data);
            $sql = "UPDATE company SET c_code = '$companyModelObject->code', c_name = '$companyModelObject->name', g_id = '$companyModelObject->groupId', c_favorite = '$companyModelObject->favorite' WHERE c_code= '$companyModelObject->hiddenCode'";
            $this->mysqli->query($sql);
        }
    }

    function updateFavorite($id, $isFavorite) {
        $sql = "UPDATE company SET c_favorite = '$isFavorite' WHERE c_code= '$id'";
        $this->mysqli->query($sql);
    }

    function read() {
        if ($this->mysqli != NULL) {
            $sql = "SELECT * FROM company INNER JOIN c_group ON company.g_id = c_group.g_id";
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
