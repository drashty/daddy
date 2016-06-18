<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'TO_Company.php';

if (isset($_REQUEST['favorite']) && isset($_REQUEST['c_code'])) {
    $id = $_REQUEST['c_code'];
    $isFavorite = $_REQUEST['favorite'];
    $companyTableOperation = new TO_Company();
    $companyTableOperation->updateFavorite($id, $isFavorite);
}