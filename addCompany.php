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
            $(function () {
                $('#addCompany').click(function () {
                    $('#addCompanyModal')
                            .modal('setting', 'transition', 'vertical flip')
                            .modal('show');

                });

                $('#closeAddCompany').click(function (e) {
                    $('.ui.modal').modal('hide');
                    return false;
                });


            });

            $(document).ready(function () {
                $('#select')
                        .dropdown()
                        ;
            })
        </script>


    </head>
    <body>

        <?php
        include_once 'GroupTableOperation.php';
        $groupTableOperation = new GroupTableOperation();
        ?>

        <div class="ui small modal" id="addCompanyModal">

            <!--<div class="ui middle aligned center aligned grid">-->
            <!--<div class="column">-->
            <h4 class="ui dividing header">Add Company</h4>
            <div class="ui basic segment"> 
                <form class ="ui form" method="post" name="insertform" action="InsertCompany.php"> 
                    <!--<div class="ui segment">-->
                    <div class="sixteen wide field">
                        <label>Code</label>
                        <input type="text" name="c_code"/>
                    </div>

                    <div class="sixteen wide field">
                        <label>Name</label>
                        <input type="text" name="c_name"/>
                    </div>

                    <!--<div class="ui segment">--> 
                    <div class="sixteen wide field">
                        <!--                        <label>Group</label>
                                                <input type="text" name="c_group"/>-->
                        <label>Group</label>
                        <div class="ui selection dropdown" id="select">
                            <input type="hidden" name="g_id">
                            <i class="dropdown icon"></i>
                            <div class="default text">Group</div>
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
                                <input type="checkbox" name="c_favorite" checked>
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->

                    <div class="sixteen wide field">
                        <input class="ui primary button" type="submit" name="send" value="Add" id="inputid">
                        <input class="ui button" type="button" value="Cancel" id="closeAddCompany">
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
