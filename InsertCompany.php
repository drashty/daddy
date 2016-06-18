<?php

include_once 'TO_Company.php';
if (isset($_REQUEST['send'])) {
    if (isset($_REQUEST['c_hiddenCode']) && strlen($_REQUEST['c_hiddenCode']) > 0) {
        $company = new TO_Company();
        $company->updateCompanyDetails($_REQUEST);
        header("Location:index.php");
    } else {
        $company = new TO_Company();
        $company->insert($_REQUEST);
        header("Location:index.php");
    }
} 
            
            