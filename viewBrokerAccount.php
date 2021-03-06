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
        include_once 'addBroker.php';
        include_once 'addBrokerAccount.php';
        include_once 'viewBrokerAccountDetails.php';
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

            #bankAccountNameButton {
                background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                cursor:pointer;
                overflow: hidden;
                outline:none;
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
            }

            #negative-ui-brokerAccount {
                padding: 0.5em 0.5em;
                margin: 0.0em 0.0em;
            }

        </style>


        <script type="text/javascript">
            $(document).ready(function () {
                $("#resize").colResizable({liveDrag: true});

                $('.delete').click(function () {
                    console.log("VALUE" + $(this).val());
                    var dataValue = {'ba_id': $(this).val()};
                    $.ajax({
                        type: "POST",
                        url: 'DeleteBrokerAccount.php',
                        data: dataValue,
                        success: function (result) {
                            window.console.log('Successful');
                            window.location.reload();
                        },
                        error: function () {

                        }
                    });
                });
            });
        </script>
    </head>
    <body>

        <?php
        include_once 'TO_BrokerAccount.php';
        $brokerAccountTableOperation = new TO_BrokerAccount();
        ?>

        <div class="ui grid" id="bankListingMenu">
            <div class="row">
                <div class="eleven wide column">
                    <center><button class="ui button" id="bankNameTitle">Broker Accounts</button></center>
                </div>

                <div class="five wide column" id="add">
                    <div id="topButtonContainer">
                        <button class="ui secondary button" onclick="addBrokerAccount()">Add Broker Account</button>
                        <button class="ui secondary button" onclick="addBroker()">Add Broker</button>
                    </div>
                </div>
            </div>
        </div>


        <table class="ui celled striped table" id="resize">
            <col width="15px" />
            <col width="15px" />
            <col width="40px" />
            <col width="5px" />
            <col width="5px" />
            <thead>
                <tr>
                    <th><center>Broker Name</center></th>
        <th><center>User Id</center></th>
    <th><center>Account Holder Name</center></th>

<th><center>View</center></th>
<th><center>Delete</center></th>
</tr>
</thead>

<tbody>
    <?php foreach ($brokerAccountTableOperation->read() as $obj) { ?>
        <tr>
            <td><center><?php echo $obj->b_name; ?></center></td>
    <td><center><?php echo $obj->ba_userId; ?></center></td>
    <td><center><div class="menu"><button class="ui button" id="bankAccountNameButton" onclick= "editBrokerAccount(
                    '<?php echo $obj->id; ?>',
                    '<?php echo $obj->ba_name; ?>',
                    '<?php echo $obj->b_id; ?>',
                    '<?php echo $obj->b_name; ?>',
                    '<?php echo $obj->ba_birthDate; ?>',
                    '<?php echo $obj->ba_panCardNumber; ?>',
                    '<?php echo $obj->ba_userId; ?>',
                    '<?php echo $obj->ba_loginPassword; ?>',
                    '<?php echo $obj->ba_transactionPassword; ?>',
                    '<?php echo $obj->ba_partnerCode; ?>',
                    '<?php echo $obj->ba_clientCode; ?>',
                    '<?php echo $obj->ba_accountOpenDate; ?>',
                    '<?php echo $obj->ba_boId; ?>',
                    '<?php echo $obj->ba_dpId; ?>',
                    '<?php echo $obj->ba_email; ?>',
                    '<?php echo $obj->ba_notes; ?>'
                    )">

                <?php echo $obj->ba_name; ?>        
            </button></div></center></td>


    <td><center><button class="basic ui button view" id="negative-ui-brokerAccount" onclick="showbrokerAccountDetailsModal(
                    '<?php echo $obj->ba_name; ?>',
                    '<?php echo $obj->b_name; ?>',
                    '<?php echo $obj->ba_birthDate; ?>',
                    '<?php echo $obj->ba_panCardNumber; ?>',
                    '<?php echo $obj->ba_userId; ?>',
                    '<?php echo $obj->ba_loginPassword; ?>',
                    '<?php echo $obj->ba_transactionPassword; ?>',
                    '<?php echo $obj->ba_partnerCode; ?>',
                    '<?php echo $obj->ba_clientCode; ?>',
                    '<?php echo $obj->ba_accountOpenDate; ?>',
                    '<?php echo $obj->ba_boId; ?>',
                    '<?php echo $obj->ba_dpId; ?>',
                    '<?php echo $obj->ba_email; ?>',
                    '<?php echo $obj->ba_notes; ?>'
                    )" 
                        name="delete" value=<?php echo $obj->ba_id; ?> type='submit'>View</button></center></td>
    <td><center><button class="negative ui button delete" id="negative-ui-brokerAccount" name="delete" value=<?php echo $obj->id; ?> type='submit'>Delete</button></center></td>
    </tr>
<?php } ?> 
</tbody>
</table>
</body>
</html>
