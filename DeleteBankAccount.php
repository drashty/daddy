<?php
include_once 'TO_BankAccount.php';

if (isset($_REQUEST['ba_id'])) {
    $id = $_REQUEST['ba_id'];
    $bankAccountTableOperation = new TO_BankAccount();
    $bankAccountTableOperation->delete($id);
    header("Location:viewBankAccount.php");
}
