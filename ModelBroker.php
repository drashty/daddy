<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelBroker {
    var $id;
    var $name;
    
    public function __construct($data) {
        $this->id = $data['b_id'];
        $this->name = $data['b_name'];
    }
}