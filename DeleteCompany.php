<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'CompanyTableOperation.php';

if (isset($_REQUEST['c_code'])) {
    $id = $_REQUEST['c_code'];
    $companyTableOperation = new CompanyTableOperation();
    $companyTableOperation->delete($id);
    header("Location:UI/viewCompany.php");
}
