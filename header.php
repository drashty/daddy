<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dad Share Market</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/menu.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/dropdown.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/transition.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/reset.css">

        <script src="libs/semantic/examples/assets/library/jquery.min.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/transition.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dropdown.js"></script>





        <style>
            /*            .ui.menu:last-child {
                            margin-bottom: 10px;
                        }*/
        </style>

        <script>
            $(document)
                    .ready(function () {
                        $('.ui.menu .ui.dropdown').dropdown({
                            on: 'hover'
                        });
                        $('.ui.menu a.item')
                                .on('click', function () {
                                    $(this)
                                            .addClass('active')
                                            .siblings()
                                            .removeClass('active')
                                            ;
                                })
                                ;
                    })
                    ;
        </script>

    </head>
    <body>
        <div class="ui small menu">
            <div class="ui dropdown item">
                Company <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="viewCompany.php" class="item">Company List</a>
                    <a href="viewGroup.php" class="item">Group List</a>
                </div>
            </div>

            <div class="ui dropdown item">
                Accounts <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="viewBankAccount.php" class="item">Bank Accounts</a>
                    <a href="viewGroup.php" class="item">Broker Accounts</a>
                </div>
            </div>

            <a class="item">
                Reports
            </a>
        </div>
    </body>
</html>
