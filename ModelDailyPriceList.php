<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelDailyPriceList
 *
 * @author angelvasa
 */
class ModelDailyPriceList {

    var $code;
    var $name;
    var $group;
    var $type;
    var $open;
    var $high;
    var $low;
    var $close;
    var $last;
    var $prevClose;
    var $numberOfTrades;
    var $numberOfShares;
    var $netTurnOver;
    var $tdcl;

    public function __construct($data) {
        $this->code = $data[0];
        $this->name = $data[1];
        $this->group = $data[2];
        $this->type = $data[3];
        $this->open = $data[4];
        $this->high = $data[5];
        $this->low = $data[6];
        $this->close = $data[7];
        $this->last = $data[8];
        $this->prevClose = $data[9];
        $this->numberOfTrades = $data[10];
        $this->numberOfShares = $data[11];
        $this->netTurnOver = $data[12];
        $this->tdcl = $data[13];
    }
    
    
    public function parse ($data) {
        $this->code = $data['dpl_code'];
        $this->name = $data['dpl_name'];
        $this->group = $data['dpl_group'];
        $this->type = $data['dpl_type'];
        $this->open = $data['dpl_open'];
        $this->high = $data['dpl_high'];
        $this->low = $data['dpl_low'];
        $this->close = $data['dpl_close'];
        $this->last = $data['dpl_last'];
        $this->prevClose = $data['dpl_prevclose'];
        $this->numberOfTrades = $data['dpl_no_trades'];
        $this->numberOfShares = $data['dpl_no_of_shares'];
        $this->netTurnOver = $data['dpl_net_turnover'];
        $this->tdcl = $data['dpl_tdcloindi'];
    }

}
