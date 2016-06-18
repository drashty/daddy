<html>
    <head>
        <?php
        include_once 'header.php'; 
        include_once 'addCompany.php';
        ?>
      
        <title>View</title>
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
    </head>

    <body> 
        <div class="ui page dimmer">
            <div class="content">
                <!--Page content will go here-->
            </div>
        </div>
        <?php
        include_once 'TO_Company.php';
        $companyTableOperation = new TO_Company();
        ?>

        <style type="text/css"> 

            #negative-ui {
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
            }

            #companyNameButton {
                background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                cursor:pointer;
                overflow: hidden;
                outline:none;
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
            }

            #companyNameTitle {
                background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                cursor:pointer;
                overflow: hidden;
                outline:none;
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
                margin-top:0.0cm; 
                font-size: 26px;
            }

            #companyListingMenu {
                height: 85px;
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
                        }, 
                        error: function(){
                            
                        }
                    });
                });
            });

            function cellClicked(code, groupCode, groupName, companyName, favorite) {
                console.log("CELL CLICKED");
                editCompany(code, groupCode, groupName, companyName, favorite);
            }
            
//            $('#addComp').click(addCompany);



        </script>


        <div class="ui grid" id="companyListingMenu">
            <div class="row">
                <div class="column"></div>
                <div class="fourteen wide column">
                    <center><button class="ui button" id="companyNameTitle">Company Listing</button></center>
                </div>
                <div class="column">
                    <center>
                        <button onclick="addCompany()" class="ui primary circular icon button">
                            <i class="icon plus"></i>
                        </button>
                    </center>
                </div>
            </div>
        </div>




        <table class="ui celled striped table" id="resize">
            <col width="10px" />
            <col width="10px" />
            <col width="40px" />
            <col width="10px" />
            <col width="10px" />
            <thead>
                <tr>
                    <th><center>Code</center></th>
        <th><center>Group</center></th>
    <th><center>Name</center></th>
<th><center>Favorite</center></th>
<th><center>Delete</center></th>
</tr>
</thead>

<tbody>
    <?php for ($i = 0; $i < 20; $i++) { ?>
        <?php foreach ($companyTableOperation->read() as $obj) { ?>
            <tr>
                <td><center><?php echo $obj->c_code; ?></center></td>
        <td><center><?php echo $obj->g_name; ?></center></td>
        <td><center><button class="ui button" id="companyNameButton" onclick="cellClicked('<?php echo $obj->c_code; ?>', '<?php echo $obj->g_id; ?>', '<?php echo $obj->g_name; ?>', '<?php echo $obj->c_name; ?>', '<?php echo $obj->c_favorite; ?>')" class="item"><?php echo $obj->c_name; ?></button></center></td>
        <td>
        <center>
            <div class="ui fitted checkbox">
                <div class="ui fitted toggle checkbox">
                    <input type="checkbox" class="favorite" value=<?php echo $obj->c_code; ?> <?php
                    if ($obj->c_favorite == '1') {
                        echo 'checked';
                    }
                    ?>>
                    <label></label>
                </div>
            </div>
        </center>
        </td>
        <td><center><button class="negative ui button" id="negative-ui" name="delete" value=<?php echo $obj->c_code; ?> type='submit'>Delete</button></center></td>
        </tr>
    <?php } ?> 
    <?php
}
?>

</tbody>
</table>
</div>



<!--        <button class="circular ui icon button" id="fixedButton">
    <i class="icon settings"></i>
</button>-->
</body>
</html>