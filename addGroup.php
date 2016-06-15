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
        <script type="text/javascript" src="libs/semantic/dist/components/modal.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/form.js"></script>
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/checkbox.css">

        <script type="text/javascript">

            function closeAddGroup() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function addGroup() {
                $('#groupTextField').val("");
                $('#groupId').val("");
                $('#modalHeader').html("Add Group");
                $('#submitGroupButton').val("Add");
                showModal();
            }

            function editGroup(groupId, groupName) {
                $('#groupTextField').val(groupName);
                $('#groupId').val(groupId);
                $('#modalHeader').html("Edit Group");
                $('#submitGroupButton').val("Update");
                showModal();
            }

            function showModal() {
                $('#addGroupModal')
                        .modal('setting', 'transition', 'vertical flip')
                        .modal('show');
            }
        </script>
    </head>
    <body>



        <div class="ui small modal" id="addGroupModal">
            <h4 class="ui dividing header" id="modalHeader">Add Group</h4>


            <div class="ui basic segment"> 
                <form class ="ui form" id="groupFormId" method="post" name="insertform" action="InsertGroup.php"> 
                    <!--<div class="ui segment">-->
                    <input type="hidden" id="groupId" name="g_id" value=""/>
                    <div class="sixteen wide field">
                        <label>Name</label>
                        <input type="text" id="groupTextField" name="g_name" onfocus="this.value = this.value;" value= '<?php echo $result->g_name ?>'/>
                    </div>




                    <div class="sixteen wide field">
                        <input class="ui primary button" id="submitGroupButton" type="submit" name="send" value="Add" id="inputid">
                        <input class="ui button" type="button" value="Cancel" onclick="closeAddGroup()">
                    </div>



                </form>
            </div>
        </div>
    </div>


</body>
</html>
