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
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/grid.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/icon.css">
        <script src="libs/resizablecell/colResizable.js"></script>
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/dimmer.css">
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>
    </head>
    <body>
        <?php include_once 'addGroup.php'; ?>
        <?php
        include_once 'GroupTableOperation.php';
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

            #groupNameButton {
                background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                cursor:pointer;
                overflow: hidden;
                outline:none;
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
            }
            
            #groupNameTitle {
                background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                cursor:pointer;
                overflow: hidden;
                outline:none;
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
                margin-top:-0.1cm; 
                font-size: 26px;
            }

            #groupListingMenu {
                height: 80px;
            }

            table.fixed { table-layout:fixed; }
            table.fixed td { overflow: hidden; }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {

                $(function () {
                    $("#resize").colResizable();
                });

                $("#resize").colResizable({liveDrag: true});

                $('#negative-ui').click(function () {
                    var dataValue = {'g_id': $(this).val()};
                    $.ajax({
                        type: "POST",
                        url: 'DeleteGroup.php',
                        data: dataValue,
                        success: function (result) {
                            window.console.log('Successful');
                            window.location.reload();
                        }
                    });
                });
            });
        </script>





        <div class="ui grid" id="groupListingMenu">
            <div class="row">
                <div class="column"></div>
                <div class="fourteen wide column">
                    <center><button class="ui button" id="groupNameTitle">Group Listing</button></center>
                </div>
                <div class="column">
                    <center>
                        <button onclick="addGrpup()" class="ui primary circular icon button">
                            <i class="icon plus"></i>
                        </button>
                    </center>
                </div>
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

                <td><center><div class="menu"><button class="ui button" id="groupNameButton" onclick="editGroup('<?php echo $obj->g_id; ?>', '<?php echo $obj->g_name; ?>')" class="item"><?php echo $obj->g_name; ?></button></div></center></td>
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
