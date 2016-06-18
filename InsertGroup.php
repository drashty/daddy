<?php

include_once 'TO_Group.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['g_id']) && strlen($_REQUEST['g_id']) > 0) {
        $groupTable = new TO_Group();
        $groupTable->updateGroupName($_REQUEST);
        header("Location:viewGroup.php");
    } else {
        $groupTable = new TO_Group();
        $groupTable->insert($_REQUEST);
        header("Location:viewGroup.php");
    }
} 
            
           