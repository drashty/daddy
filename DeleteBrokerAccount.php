<?php
include_once 'TO_BrokerAccount.php';

if (isset($_REQUEST['ba_id'])) {
    $id = $_REQUEST['ba_id'];
    $brokerAccountTableOperation = new TO_BrokerAccount();
    $brokerAccountTableOperation->delete($id);
    header("Location:viewBrokerAccount.php");
}
