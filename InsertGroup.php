<?php

include_once 'GroupTableOperation.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['g_id'])) {
        $groupTable = new GroupTableOperation();
        $groupTable->updateGroupName($_REQUEST);
        header("Location:viewGroup.php");
    } else {
        $groupTable = new GroupTableOperation();
        $groupTable->insert($_REQUEST);
        header("Location:viewGroup.php");
    }
} 
            
           