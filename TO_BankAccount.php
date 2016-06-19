<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TO_BankAccount
 *
 * @author angelvasa
 */

include_once 'DatabaseConnection.php';
include_once 'ModelBankAccount.php';

class TO_BankAccount {
    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
            $ba_ModelObject = new ModelBankAccount($data);
            $sql = "INSERT INTO bank_account("
                    . "ba_holderName, "
                    . "b_id, "
                    . "ba_accountNumber, "
                    . "ba_ifsc, "
                    . "ba_netBankingUserName, "
                    . "ba_netBankingLoginPwd, "
                    . "ba_netBankingTransactionPwd, "
                    . "ba_atmCardNumber, "
                    . "ba_atmExpiryMonth, "
                    . "ba_atmExpiryYear, "
                    . "ba_atmCvv, "
                    . "ba_atmPaymentPwd, "
                    . "ba_atmPin, "
                    . "ba_mobileAppPin, "
                    . "ba_notes) VALUES (?, ?, ?, ? ,? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                print_r($ba_ModelObject);
                $stmt->bind_param("sssssssssssssss", 
                        $ba_ModelObject->holderName, 
                        $ba_ModelObject->bankId,
                        $ba_ModelObject->accountNumber,
                        $ba_ModelObject->ifsc,
                        $ba_ModelObject->netBankingUserName,
                        $ba_ModelObject->netBankingLoginPwd,
                        $ba_ModelObject->netBankingTransactionPwd,
                        $ba_ModelObject->atmCardNumber,
                        $ba_ModelObject->atmExpiryMonth,
                        $ba_ModelObject->atmExpiryYear,
                        $ba_ModelObject->atmCvv,
                        $ba_ModelObject->atmPaymentPwd,
                        $ba_ModelObject->atmPin,
                        $ba_ModelObject->mobileAppPin,
                        $ba_ModelObject->notes
                        );
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
            $sql = "SELECT * FROM bank_account INNER JOIN bank ON bank_account.b_id = bank.b_id";
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
            $sql = "DELETE FROM bank_account where ba_id=$id";
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
