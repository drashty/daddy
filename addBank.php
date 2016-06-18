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

            function closeAddBank() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function addBank() {
                $('#bankTextField').val("");
                $('#bankId').val("");
                $('#modalHeader').html("Add Bank");
                $('#submitBankButton').val("Add");
                showModal();
            }

            function editBank(bankId, bankName) {
                $('#bankTextField').val(bankName);
                $('#bankId').val(bankId);
                $('#modalHeader').html("Edit Bank");
                $('#submitBankButton').val("Update");
                showModal();
            }

            function showModal() {
                $('#addBankModal')
                        .modal('setting', 'transition', 'vertical flip')
                        .modal('show');
            }
        </script>
    </head>
    <body>



        <div class="ui small modal" id="addBankModal">
            <h4 class="ui dividing header" id="modalHeader">Add Bank</h4>


            <div class="ui basic segment"> 
                <form class ="ui form" id="bankFormId" method="post" name="insertform" action="InsertBank.php"> 
                    <!--<div class="ui segment">-->
                    <input type="hidden" id="bankId" name="b_id" value=""/>
                    <div class="sixteen wide field">
                        <label>Name</label>
                        <input type="text" id="bankTextField" name="b_name" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                    </div>




                    <div class="sixteen wide field">
                        <input class="ui primary button" id="submitBankButton" type="submit" name="send" value="Add" id="inputid">
                        <input class="ui button" type="button" value="Cancel" onclick="closeAddBank()">
                    </div>



                </form>
            </div>
        </div>


</body>
</html>
