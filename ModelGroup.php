<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelGroup {
    var $id;
    var $name;
    
    public function __construct($data) {
        $this->id = $data['g_id'];
        $this->name = $data['g_name'];
    }
}