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
            $(function () {
                $('#addGroup').click(function () {
                    $('#addGroupModal')
                            .modal('setting', 'transition', 'vertical flip')
                            .modal('show');
                });

                $('#closeAddGroup').click(function (e) {
                    $('.ui.modal').modal('hide');
                    return false;
                });
            });
        </script>
    </head>
    <body>


        <div class="ui small modal" id="addGroupModal">
            <h4 class="ui dividing header">Add Group</h4>
            <div class="ui basic segment"> 
                <form class ="ui form" method="post" name="insertform" action="InsertGroup.php"> 
                    <!--<div class="ui segment">-->
                    <div class="fifteen wide field">
                        <label>Name</label>
                        <input type="text" name="g_name"/>
                    </div>




                    <div class="fifteen wide field">
                        <input class="ui primary button" type="submit" name="send" value="Add" id="inputid">
                        <input class="ui button" type="button" value="Cancel" id="closeAddGroup">
                    </div>



                </form>
            </div>
        </div>
    </div>


</body>
</html>
