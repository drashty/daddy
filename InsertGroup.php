<?php

	include_once 'GroupTableOperation.php';
            if (isset($_POST['send'])) {
                $groupTable = new GroupTableOperation();
                $groupTable->insert($_POST);   
                header("Location:index.php");
            } 
            
           