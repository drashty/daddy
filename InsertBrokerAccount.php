<?php

include_once 'TO_BrokerAccount.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['ba_id']) && strlen($_REQUEST['ba_id']) > 0) {
        $brokerAccount = new TO_BrokerAccount();
        $brokerAccount->updateBrokerAccountDetails($_REQUEST);
        header("Location:viewBrokerAccount.php");
    } else {
        $brokerAccount = new TO_BrokerAccount();
        $brokerAccount->insert($_REQUEST);
        header("Location:viewBrokerAccount.php");
    }
} 
         