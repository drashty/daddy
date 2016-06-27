<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Dad's Software</title>
        <?php
        include_once 'header.php';
//        include_once 'viewCompany.php';
        include_once 'Downloader.php';
        
        $download = new Downloader();
//        $download->downloadFile("http://www.bseindia.com/download/BhavCopy/Equity/EQ010616_CSV.ZIP", "../libs");
        $download->startDownloadingPriceList();
        ?>
    </head>

    <body>

    </body>
</html>
