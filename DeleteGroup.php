<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'GroupTableOperation.php';

if (isset($_REQUEST['g_id'])) {
    $id = $_REQUEST['g_id'];
    $groupTableOperation = new GroupTableOperation();
    $groupTableOperation->delete($id);
    header("Location:viewGroup.php");
}
