<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TO_DailyPriceList
 *
 * @author angelvasa
 */

include_once 'DatabaseConnection.php';
include_once 'ModelDailyPriceList.php';

class TO_DailyPriceList {

    var $mysqli;

    function insert($data) {
        if ($this->mysqli != NULL) {
//            $dplModelObject = new ModelDailyPriceList($data);
            $dplModelObject = $data;
            $sql = "INSERT INTO daily_price_list("
                    . "dpl_code, "
                    . "dpl_name, "
                    . "dpl_group, "
                    . "dpl_type, "
                    . "dpl_open, "
                    . "dpl_high, "
                    . "dpl_low, "
                    . "dpl_close, "
                    . "dpl_last, "
                    . "dpl_prevclose, "
                    . "dpl_no_trades, "
                    . "dpl_no_of_shares, "
                    . "dpl_net_turnover, "
                    . "dpl_tdcloindi"
                    . ") VALUES (?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?)";
            if ($this->mysqli->prepare($sql)) {
                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param("ssssssssssssss", 
                        $dplModelObject->code, 
                        $dplModelObject->name, 
                        $dplModelObject->group, 
                        $dplModelObject->type,
                        $dplModelObject->open,
                        $dplModelObject->high,
                        $dplModelObject->low,
                        $dplModelObject->close,
                        $dplModelObject->last,
                        $dplModelObject->prevClose,
                        $dplModelObject->numberOfTrades,
                        $dplModelObject->numberOfShares,
                        $dplModelObject->netTurnOver,
                        $dplModelObject->tdcl
                        );
                $stmt->execute();
            } else {
                echo mysqli_error($this->mysqli);
            }
        } else {
            echo 'NO Connection';
        }
    }

    public function __construct() {
        $conn = new DatabaseConnection();
        $this->mysqli = $conn->connect();
    }

    public function __destruct() {
        $this->mysqli = NULL;
    }

}
