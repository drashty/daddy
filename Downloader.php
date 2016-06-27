<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Downloader
 *
 * @author angelvasa
 */
include_once 'TO_DailyPriceList.php';
include_once 'ModelDailyPriceList.php';
require 'vendor/autoload.php';

use Carbon\Carbon;

const BHAV_COPY_DOWNLOAD_URL = 'http://www.bseindia.com/download/BhavCopy/Equity/';

class Downloader {

    //put your code here

    function startDownloadingPriceList() {
        $dt = Carbon::create(16, 04, 01)->toDateString();
        $date = Carbon::parse($dt)->format('y-m-d');
        $dayArray = explode('-', $date);
        $fileName = 'EQ' . $dayArray[2] . $dayArray[1] . $dayArray[0];
        $documentPath = dirname(__FILE__) . "" . '/DownloadFolder.temp/';
        if ($this->downloadFile(BHAV_COPY_DOWNLOAD_URL, $documentPath, $fileName)) {
            
        }
    }

    function downloadFile($url, $documentPath, $fileName) {

        $this->createDirectory($documentPath);
        $temp = $documentPath . $fileName . '.zip';
        $urlPath = $url.$fileName.'_CSV.ZIP';
        file_put_contents($temp, fopen($urlPath, 'r'));

        $dplTableOperation = new TO_DailyPriceList();


        $zip = new ZipArchive;
        $res = $zip->open($temp);
        if ($res === TRUE) {
            $zip->extractTo($documentPath);
            $zip->close();
        }


        $handle = fopen($documentPath . $fileName . '.csv', "r");
        $count = 0;
        if (($handle) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($count > 0) {
                    $dpl = new ModelDailyPriceList($data);
                    $dplTableOperation->insert($dpl);
                }
                $count++;
            }
        }

        $this->deleteDirectory($documentPath);

        return TRUE;
    }

    function createDirectory($path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    function deleteDirectory($path) {
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));
            foreach ($files as $file) {
                $this->deleteDirectory(realpath($path) . '/' . $file);
            }
            return rmdir($path);
        } else if (is_file($path) === true) {
            return unlink($path);
        }

        return false;
    }

}
