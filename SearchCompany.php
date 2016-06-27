<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'TO_Company.php';
if (isset($_REQUEST['enteredText'])) {
        $bankTable = new TO_Company();
        echo json_encode($bankTable->readLike($_REQUEST['enteredText']));
} 
   