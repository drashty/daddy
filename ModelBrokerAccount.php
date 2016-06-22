<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelBrokerAccount
 *
 * @author angelvasa
 */
class ModelBrokerAccount {
    var $id;
    var $name;
    var $brokerId;
    var $birthDate;
    var $panCardNumber;
    var $userId; 
    var $loginPassword;
    var $transactionPassword;
    var $partnerCode;
    var $clientCode;
    var $accountOpenDate;
    var $boId;
    var $dpId;
    var $emailId;
    var $notes;
    
    
    public function __construct($data) {
        $this->id = $data['id'];
        $this->name = $data['ba_name'];
        $this->brokerId = $data['b_id'];
        $this->birthDate = $data['ba_birthDate'];
        $this->panCardNumber = $data['ba_panCardNumber'];
        $this->userId = $data['ba_userId'];
        $this->loginPassword = $data['ba_loginPassword'];
        $this->transactionPassword = $data['ba_transactionPassword'];
        $this->partnerCode = $data['ba_partnerCode'];
        $this->clientCode = $data['ba_clientCode'];
        $this->accountOpenDate = $data['ba_accountOpenDate'];
        $this->boId = $data['ba_boId'];
        $this->dpId = $data['ba_dpId'];
        $this->emailId = $data['ba_email'];
        $this->notes = $data['ba_notes'];
    }
}
