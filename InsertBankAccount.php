<?php

include_once 'TO_BankAccount.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['ba_id']) && strlen($_REQUEST['ba_id']) > 0) {
        $bankTable = new TO_BankAccount();
        $bankTable->updateBankAccountDetails($_REQUEST);
        header("Location:viewBankAccount.php");
    } else {
        $bankTable = new TO_BankAccount();
        $bankTable->insert($_REQUEST);
        header("Location:viewBankAccount.php");
    }
} 
   