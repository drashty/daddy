<?php

class CompanyModel {
    var $code;
    var $name;
    var $groupId; 
    var $favorite;
    
    public function __construct($data) {
       $this->code = $data['c_code'];
       $this->name = $data['c_name'];
       $this->groupId = $data['g_id'];
       
       if($data['c_favorite'] == 'on') {
           $this->favorite = "1";
       } else {
           $this->favorite = "0";
       }
       
    }
}
