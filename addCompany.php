<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title></title>
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/form.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/reset.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/modal.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/checkbox.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/dropdown.css">


        <script type="text/javascript" src="libs/semantic/dist/components/modal.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/form.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dropdown.js"></script>




        <script type="text/javascript">
            $(document).ready(function () {
                $('#select').dropdown();
                $('.ui.modal').modal();
            });


            function closeAddCompany() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function addCompany() {
                $('#companyCodeTextField').val("");
                $('#groupNameTextField').html("");
                $('#companyNameTextField').val("");
                $('#groupCodeTextField').val("");
                $('#favoriteSwitch').prop('checked', true);
                $('#companyModalHeader').html("Add Company");
                $('#editCompanyCodeHiddenTextField').val("");
                $('#submitCompanyButton').val("Add");
                showCompanyModal();
            }

            function editCompany(code, groupCode, groupName, companyName, favorite) {
                console.log(favorite);
                $('#companyCodeTextField').val(code);
                $('#groupNameTextField').html(groupName);
                $('#companyNameTextField').val(companyName);
                $('#groupCodeTextField').val(groupCode);
                $('#editCompanyCodeHiddenTextField').val(code);
                if (favorite == 1) {
                    $('#favoriteSwitch').prop('checked', true);
                } else {
                    $('#favoriteSwitch').prop('checked', false);
                }
                $('#companyModalHeader').html("Edit Company");
                $('#submitCompanyButton').val("Edit");
                showCompanyModal();
            }

            function showCompanyModal() {
                $('#addCompanyModal')
                        .modal('setting', 'transition', 'vertical flip')
                        .modal('show');
            }
        </script>


    </head>
    <body>
        <?php
        include_once 'TO_Group.php';
        $groupTableOperation = new TO_Group();
        ?>
        <div class="ui small modal" id="addCompanyModal">

            <!--<div class="ui middle aligned center aligned grid">-->
            <!--<div class="column">-->
            <h4 id="companyModalHeader" class="ui dividing header">Add Company</h4>
            <div class="ui basic segment"> 
                <form class ="ui form" method="post" id="addCompanyForm" name="insertform" action="InsertCompany.php"> 
                    <!--<div class="ui segment">-->
                    <div class="sixteen wide field">
                        <label>Code</label>
                        <input id="editCompanyCodeHiddenTextField" type="hidden" name="c_hiddenCode"/>
                        <input id="companyCodeTextField" type="text" name="c_code"/>
                    </div>

                    <div class="sixteen wide field">
                        <label>Name</label>
                        <input id="companyNameTextField" type="text" name="c_name"/>
                    </div>

                    <!--<div class="ui segment">--> 
                    <div class="sixteen wide field">
                        <!--                        <label>Group</label>
                                                <input type="text" name="c_group"/>-->
                        <label>Group</label>
                        <div class="ui selection dropdown" id="select">
                            <input type="hidden" name="g_id" id="groupCodeTextField">
                            <i class="dropdown icon"></i>
                            <div class="text" id="groupNameTextField"></div>
                            <div class="menu">

                                <?php foreach ($groupTableOperation->read() as $obj) { ?>
                                    <div class = "item" data-value = <?php echo $obj->g_id; ?> > <?php echo $obj->g_name; ?> </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->

                    <!--<div class="fifteen wide field">-->
                    <div class="sixteen wide field">
                        <label>Add to favorite</label>
                        <div class="ui segment">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" id="favoriteSwitch" name="c_favorite" checked>
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->

                    <div class="sixteen wide field">
                        <input class="ui primary button" id="submitCompanyButton" type="submit" name="send" value="Add">
                        <input class="ui button" type="button" value="Cancel" onclick="closeAddCompany()">
                    </div>
                    <!--</div>-->


                </form>
            </div>
            <!--</div>-->
            <!--</div>-->
        </div>
    </div>


</body>
</html>
