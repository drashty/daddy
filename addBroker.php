<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/form.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/modal.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/reset.css">
        <script type="text/javascript" src="libs/semantic/dist/components/modal.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/form.js"></script>

        <script type="text/javascript">

            function closeAddBroker() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function addBroker() {
                $('#brokerTextField').val("");
                $('#brokerId').val("");
                $('#modalHeader').html("Add Broker");
                $('#submitBrokerButton').val("Add");
                showModal();
            }

            function editBroker(BrokerId, BrokerName) {
                $('#brokerTextField').val(BrokerName);
                $('#brokerId').val(BrokerId);
                $('#modalHeader').html("Edit Broker");
                $('#submitBrokerButton').val("Update");
                showModal();
            }

            function showModal() {
                $('#addBrokerModal')
                        .modal('setting', 'transition', 'vertical flip')
                        .modal('show');
            }
        </script>
    </head>
    <body>



        <div class="ui small modal" id="addBrokerModal">
            <h4 class="ui dividing header" id="modalHeader">Add Broker</h4>


            <div class="ui basic segment"> 
                <form class ="ui form" id="brokerFormId" method="post" name="insertform" action="InsertBroker.php"> 
                    <!--<div class="ui segment">-->
                    <input type="hidden" id="brokerId" name="b_id" value=""/>
                    <div class="sixteen wide field">
                        <label>Name</label>
                        <input type="text" id="brokerTextField" name="b_name" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                    </div>




                    <div class="sixteen wide field">
                        <input class="ui primary button" id="submitBrokerButton" type="submit" name="send" value="Add" id="inputid">
                        <input class="ui button" type="button" value="Cancel" onclick="closeAddBroker()">
                    </div>



                </form>
            </div>
        </div>


</body>
</html>
