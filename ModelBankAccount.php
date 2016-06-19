<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelBankAccount
 *
 * @author angelvasa
 */
class ModelBankAccount {
    var $id;
    var $holderName;
    var $bankId;
    var $accountNumber;
    var $ifsc;
    var $netBankingUserName;
    var $netBankingLoginPwd;
    var $netBankingTransactionPwd;
    var $atmCardNumber;
    var $atmExpiryMonth;
    var $atmExpiryYear;
    var $atmCvv;
    var $atmPaymentPwd;
    var $atmPin;
    var $mobileAppPin;
    var $notes;
    
    
    public function __construct($data) {
        $this->id = $data['ba_id'];
        $this->holderName = $data['ba_holderName'];
        $this->bankId = $data['b_id'];
        $this->accountNumber = $data['ba_accountNumber'];
        $this->ifsc = $data['ba_ifsc'];
        $this->netBankingUserName = $data['ba_netBankingUserName'];
        $this->netBankingLoginPwd = $data['ba_netBankingLoginPwd'];
        $this->netBankingTransactionPwd = $data['ba_netBankingTransactionPwd'];
        $this->atmCardNumber = $data['ba_atmCardNumber'];
        $this->atmExpiryMonth = $data['ba_atmExpiryMonth'];
        $this->atmExpiryYear = $data['ba_atmExpiryYear'];
        $this->atmCvv = $data['ba_atmCvv'];
        $this->atmPaymentPwd = $data['ba_atmPaymentPwd'];
        $this->atmPin = $data['ba_atmPin'];
        $this->mobileAppPin = $data['ba_mobileAppPin'];
        $this->notes = $data['ba_notes'];
    }
}
