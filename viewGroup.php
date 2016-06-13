<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include_once 'header.php'; ?>
        <title>View</title>
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/table.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/checkbox.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/button.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/segment.css">
        <script src="libs/resizablecell/colResizable.js"></script>
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/dimmer.css">
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>
    </head>
    <body>
        <?php
        include 'GroupTableOperation.php';
        $groupTableOperation = new GroupTableOperation();
        ?>


        <div class="ui page dimmer">
            <div class="content">
                <!--Page content will go here-->
            </div>
        </div>


        <style type="text/css"> 
            #fixedButton {
                position: fixed;
                bottom: 0px;
                right: 0px; 
            }

            #negative-ui {
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
            }

            table.fixed { table-layout:fixed; }
            table.fixed td { overflow: hidden; }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                $(function () {
                    $("#resize").colResizable();
                });
                $('.favorite').click(function () {
                    console.log($(this).val());
                    console.log($(this).is(':checked'));
                    var dataValue = {'c_code': $(this).val(), 'favorite': $(this).is(':checked') ? 1 : 0};
                    $.ajax({
                        type: "POST",
                        url: 'UpdateFavorite.php',
                        data: dataValue,
                        success: function (result) {
                            window.console.log('Successful');
                        }
                    });
                });
                $("#resize").colResizable({liveDrag: true});

                $('#negative-ui').click(function () {
                    var dataValue = {'c_code': $(this).val()};
                    $.ajax({
                        type: "POST",
                        url: 'DeleteCompany.php',
                        data: dataValue,
                        success: function (result) {
                            window.console.log('Successful');
                            window.location.reload();
                        }
                    });
                });
            });




        </script>





        <div class="ui top attached button">
            <div class="ui large buttons">
                <button class="ui button">Company Groups</button>
            </div>
        </div>
        <table class="ui celled striped table" id="resize">
            <col width="40px" />
            <col width="10px" />
            <col width="10px" />
            <col width="40px" />
            <thead>
                <tr>
                    <th><center></center></th>
        <th><center>Group Name</center></th>
    <th><center>Delete</center></th>
<th><center></center></th>
</tr>
</thead>

<tbody>
    <?php for ($i = 0; $i < 20; $i++) { ?>
        <?php foreach ($groupTableOperation->read() as $obj) { ?>
            <tr>
                <td></td>
                <td><center><?php echo $obj->g_name; ?></center></td>
        <td><center><button class="negative ui button" id="negative-ui" name="delete" value=<?php echo $obj->g_id; ?> type='submit'>Delete</button></center></td>
        <td></td>
        </tr>
    <?php } ?> 
    <?php
}
?>

</tbody>
</table>
</div>


</body>
</html>
