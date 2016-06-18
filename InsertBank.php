<?php

include_once 'TO_Bank.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['b_id']) && strlen($_REQUEST['b_id']) > 0) {
        $bankTable = new TO_Bank();
        $bankTable->updateGroupName($_REQUEST);
        header("Location:viewBank.php");
    } else {
        $bankTable = new TO_Bank();
        $bankTable->insert($_REQUEST);
        header("Location:viewBank.php");
    }
} 
            
           