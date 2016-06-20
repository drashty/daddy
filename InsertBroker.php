<?php

include_once 'TO_Broker.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['b_id']) && strlen($_REQUEST['b_id']) > 0) {
        $groupTable = new TO_Broker();
        $groupTable->updateBrokerName($_REQUEST);
        header("Location:viewBroker.php");
    } else {
        $groupTable = new TO_Broker();
        $groupTable->insert($_REQUEST);
        header("Location:viewBroker.php");
    }
} 
            
           