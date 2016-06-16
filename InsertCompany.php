<?php

include_once 'CompanyTableOperation.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['c_hiddenCode'])) {
        $gamesTable = new CompanyTableOperation();
        $gamesTable->updateCompanyDetails($_REQUEST);
        header("Location:index.php");
    } else {
        $gamesTable = new CompanyTableOperation();
        $gamesTable->insert($_REQUEST);
        header("Location:index.php");
    }
} 
            
            