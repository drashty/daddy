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


        <script src="libs/semantic/examples/assets/library/jquery.min.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/transition.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dropdown.js"></script>
        
        <?php include_once 'addCompany.php'; ?>
        <?php include_once 'addGroup.php'; ?>



        <style>
            .ui.menu:last-child {
                margin-bottom: 10px;
            }
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

                        $('.ui.modal')
                                .modal()
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
                    <a id="addCompany" class="item">Add Company</a>
                    <a id="addGroup" onclick="addGroup()" class="item">Add Group</a>
                    <a href="viewCompany.php" class="item">View Company</a>
                    <a href="viewGroup.php" class="item">View Group</a>
                </div>
            </div>

            <a class="item">
                Group
            </a>

            <a class="item">
                Reports
            </a>
        </div>
    </body>
</html>
