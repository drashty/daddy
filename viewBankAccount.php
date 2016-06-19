<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include_once 'header.php';
        include_once 'addBank.php';
        include_once 'addBankAccount.php';
        ?>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/table.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/checkbox.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/button.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/segment.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/menu.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/input.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/icon.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/grid.css">
        <script src="libs/resizablecell/colResizable.js"></script>
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/dimmer.css">
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>

        <style type="text/css">

            #bankNameTitle {
                background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                cursor:pointer;
                overflow: hidden;
                outline:none;
                padding: 0.3em 0.5em;
                margin: 0.0em 0.0em;
                margin-top:0.0cm; 
                font-size: 26px;
            }

            #topButtonContainer {
                margin-top:5px; float: right; margin-right: 5px
            }


            #bankListingMenu {
                height: 85px;
            }
        </style>
    </head>
    <body>
        <div class="ui grid" id="bankListingMenu">
            <div class="row">
                <div class="twelve wide column">
                    <center><button class="ui button" id="bankNameTitle">Bank Listing</button></center>
                </div>

                <div class="four wide column" id="add">
                    <div id="topButtonContainer">
                        <button class="ui secondary button" onclick="addBankAccount()">Add Bank Account</button>
                        <button class="ui secondary button" onclick="addBank()">Add Bank</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
