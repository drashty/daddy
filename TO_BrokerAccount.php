<?php

include_once 'DatabaseConnection.php';
include_once 'ModelBrokerAccount.php';

class TO_BrokerAccount {

    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
            $brokerAccountModelObject = new ModelBrokerAccount($data);
            $sql = "INSERT INTO broker_account("
                    . "ba_name, "
                    . "b_id, "
                    . "ba_birthDate, "
                    . "ba_panCardNumber,"
                    . "ba_userId,"
                    . "ba_loginPassword,"
                    . "ba_transactionPassword,"
                    . "ba_partnerCode,"
                    . "ba_clientCode,"
                    . "ba_accountOpenDate,"
                    . "ba_boId,"
                    . "ba_dpId,"
                    . "ba_email,"
                    . "ba_notes"
                    . ") "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                print_r($brokerAccountModelObject);
                $stmt->bind_param("ssssssssssssss", 
                        $brokerAccountModelObject->name, 
                        $brokerAccountModelObject->brokerId, 
                        $brokerAccountModelObject->birthDate, 
                        $brokerAccountModelObject->panCardNumber,
                        $brokerAccountModelObject->userId,
                        $brokerAccountModelObject->loginPassword,
                        $brokerAccountModelObject->transactionPassword,
                        $brokerAccountModelObject->partnerCode,
                        $brokerAccountModelObject->clientCode,
                        $brokerAccountModelObject->accountOpenDate,
                        $brokerAccountModelObject->boId,
                        $brokerAccountModelObject->dpId,
                        $brokerAccountModelObject->emailId,
                        $brokerAccountModelObject->notes
                        );
                $stmt->execute();
                echo 'INSERT QUERY';
            } else {
                echo mysqli_error($this->mysqli);
            }
        } else {
            echo 'NO Connection';
        }
    }
    
    function updateBrokerAccountDetails($data) {
        if ($this->mysqli != NULL) {
            $brokerAccountModelObject = new ModelBrokerAccount($data);
            $sql = "UPDATE broker_account SET "
                    . "ba_name = '$brokerAccountModelObject->name', "
                    . "b_id = '$brokerAccountModelObject->brokerId', "
                    . "ba_birthDate = '$brokerAccountModelObject->birthDate', "
                    . "ba_panCardNumber = '$brokerAccountModelObject->panCardNumber', "
                    . "ba_userId = '$brokerAccountModelObject->userId', "
                    . "ba_loginPassword = '$brokerAccountModelObject->loginPassword', "
                    . "ba_transactionPassword = '$brokerAccountModelObject->transactionPassword', "
                    . "ba_partnerCode = '$brokerAccountModelObject->partnerCode', "
                    . "ba_clientCode = '$brokerAccountModelObject->clientCode', "
                    . "ba_accountOpenDate = '$brokerAccountModelObject->accountOpenDate', "
                    . "ba_boId = '$brokerAccountModelObject->boId', "
                    . "ba_dpId = '$brokerAccountModelObject->dpId', "
                    . "ba_email = '$brokerAccountModelObject->emailId', "
                    . "ba_notes = '$brokerAccountModelObject->notes'"
                    . "WHERE id= '$brokerAccountModelObject->id'";
            $this->mysqli->query($sql);
        }
    }

    function read() {
        if ($this->mysqli != NULL) {
            $sql = "SELECT * FROM broker_account INNER JOIN broker ON broker_account.b_id = broker.b_id";
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
            $sql = "DELETE FROM broker_account where b_id=$id";
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
