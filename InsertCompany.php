<?php

	include 'CompanyTableOperation.php';
            if (isset($_POST['send'])) {
                $gamesTable = new CompanyTableOperation();
                $gamesTable->insert($_POST);   
                header("Location:index.php");
            } 
            
            