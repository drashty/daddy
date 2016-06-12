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
        <div class="ui page dimmer">
            <div class="content">
                <!--Page content will go here-->
            </div>
        </div>
        <?php
        include 'CompanyTableOperation.php';
        $companyTableOperation = new CompanyTableOperation();
        ?>

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
                <button class="ui button">Add Company</button>
                <div class="or"></div>
                <button class="ui button">Add Group</button>
            </div>
        </div>
        <table class="ui single line celled table" id="resize">
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
        <td><center><?php echo $obj->c_group; ?></center></td>
        <td><center><?php echo $obj->c_name; ?></center></td>
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