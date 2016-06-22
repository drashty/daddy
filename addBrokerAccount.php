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
        <link rel="stylesheet" type="text/css" href="libs/jqueryUI/jquery-ui.css">
        <script type="text/javascript" src="libs/semantic/dist/components/modal.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/form.js"></script>
        <script type="text/javascript" src="libs/jqueryUI/jquery-ui.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#brokerNameSelection').dropdown();
                $('.ui.modal').modal();

                $("#ba_accountOpenDate").datepicker({
                    dateFormat: 'dd-mm-yy',
                    inline: true,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1930:+nn"
                });

                $("#ba_birthDate").datepicker({
                    dateFormat: 'dd-mm-yy',
                    inline: true,
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1930:+nn"
                });
            });

            function closeAddBrokerAccount() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function addBrokerAccount() {
                $('#brokerAccountTextField').val("");
                $('#brokerAccountId').val("");
                $('#modalHeaderBrokerAccount').html("Add Broker Account");
                $('#submitBrokerAccountButton').val("Add");
                showModalBrokerAccount();
            }

            function editBrokerAccount(BrokerAccountId, BrokerAccountName) {
                $('#brokerAccountTextField').val(BrokerAccountName);
                $('#brokerAccountId').val(BrokerAccountId);
                $('#modalHeaderBrokerAccount').html("Edit Broker Account");
                $('#submitBrokerAccountButton').val("Update");
                showModalBrokerAccount();
            }

            function showModalBrokerAccount() {
                $('#addBrokerAccountModal')
                        .modal('setting', 'transition', 'vertical flip')
                        .modal('show');
            }
        </script>

        <style type="text/css">
            .ui-widget {
                font-size: 1.18em;
            }
        </style>
    </head>
    <body>

        <?php
        include_once 'TO_Broker.php';
        $brokerTableOperation = new TO_Broker();
        ?>

        <div class="ui small modal" id="addBrokerAccountModal">
            <h4 class="ui dividing header" id="modalHeaderBrokerAccount">Add Broker Account</h4>


            <div class="ui basic segment"> 
                <form class ="ui form" id="brokerAccountFormId" method="post" name="insertform" action="InsertBrokerAccount.php"> 
                    <!--<div class="ui segment">-->
                    <input type="hidden" id="brokerAccountId" name="ba_id" value=""/>
                    <div class="sixteen wide field">
                        <div class="ui segment">
                            <h4 class="ui dividing header">Account Details</h4>
                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" id="ba_name" name="ba_name" placeholder="Account Name" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <div class="ui selection dropdown" id="brokerNameSelection">
                                            <input type="hidden" name="b_id" id="b_id">
                                            <i class="dropdown icon"></i>
                                            <div class="text" id="brokerNameTextField" style="">Select Broker</div>
                                            <div class="menu">

                                                <?php foreach ($brokerTableOperation->read() as $obj) { ?>
                                                    <div class = "item" data-value = <?php echo $obj->b_id; ?> > <?php echo $obj->b_name; ?> </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <div class="ui icon input">
                                            <i class="calendar icon"></i>
                                            <input type="text" id="ba_accountOpenDate" name="ba_accountOpenDate" placeholder="Account Opening Date" onfocus="this.value = this.value;"/>
                                        </div>

                                    </div>
                                    <div class="field">
                                        <div class="ui icon input">
                                            <i class="calendar icon"></i>
                                            <input type="text" id="ba_birthDate" name="ba_birthDate" placeholder="Account Holder's Birth Date" onfocus="this.value = this.value;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" id="ba_panCardNumber" name="ba_panCardNumber" placeholder="Pan Card No" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <input type="text" id="ba_email" name="ba_email" placeholder="Email" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">User Details</h4>
                            <div class="field">
                                <div class="three fields">
                                    <div class="field">
                                        <input type="text" id="ba_userId" name="ba_userId" placeholder="UserId" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <input type="text" id="ba_loginPassword" name="ba_loginPassword" placeholder="Login Password" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <input type="text" id="ba_transactionPassword" name="ba_transactionPassword" placeholder="Transaction Password" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>

                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" id="ba_partnerCode" name="ba_partnerCode" placeholder="Partner Code" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <input type="text" id="ba_clientCode" name="ba_clientCode" placeholder="Client Code" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>

                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" id="ba_dpId" name="ba_dpId" placeholder="DP ID" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <input type="text" id="ba_boId" name="ba_boId" placeholder="BO ID" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">Notes</h4>
                            <div class="field">
                                <textarea rows="2" id="ba_notes" name="ba_notes"></textarea>
                            </div>
                        </div>
                    </div>




                    <div class="sixteen wide field">
                        <input class="ui primary button" id="submitBrokerAccountButton" type="submit" name="send" value="Add" id="inputid">
                        <input class="ui button" type="button" value="Cancel" onclick="closeAddBrokerAccount()">
                    </div>



                </form>
            </div>
        </div>


    </body>
</html>
