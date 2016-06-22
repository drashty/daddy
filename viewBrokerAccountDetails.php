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
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/header.css">
        <link rel="stylesheet" type="text/css" href="libs/semantic/dist/components/dropdown.css">


        <script type="text/javascript" src="libs/semantic/dist/components/modal.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dimmer.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/form.js"></script>
        <script type="text/javascript" src="libs/semantic/dist/components/dropdown.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {
                $("#brokerAccountDetailFormId :input").prop('readonly', true);
                $('.ui.modal').modal();
            });

            function closebrokerAccountDetails() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function showbrokerAccountDetailsModal(
                    accountName,
                    brokerName,
                    birthDate,
                    panCardNumber,
                    userId,
                    loginPassword,
                    transactionPassword,
                    partnerCode,
                    clientCode,
                    accountOpenDate,
                    boId,
                    dpId,
                    email,
                    notes) {
                $('#view_ba_name').val(accountName);
                $('#view_brokerNameTextField').val(brokerName);
                $('#view_ba_birthDate').val(birthDate);
                $('#view_ba_panCardNumber').val(panCardNumber);
                $('#view_ba_userId').val(userId);
                $('#view_ba_loginPassword').val(loginPassword);
                $('#view_ba_transactionPassword').val(transactionPassword);
                $('#view_ba_partnerCode').val(partnerCode);
                $('#view_ba_clientCode').val(clientCode);
                $('#view_ba_accountOpenDate').val(accountOpenDate);
                $('#view_ba_boId').val(boId);
                $('#view_ba_dpId').val(dpId);
                $('#view_ba_email').val(email);
                $('#view_ba_notes').val(notes);

                $('#ViewbrokerAccountDetailsModal')
                        .modal('setting', 'transition', 'vertical flip')
                        .modal('show');
            }
        </script>

        <style type="text/css">
            #brokerNameTextField {
                color: #969696;
            }
        </style>
    </head>
    <body>

        <?php
        include_once 'TO_Broker.php';
        $brokerTableOperation = new TO_Broker();
        ?>


        <div class="ui small modal" id="ViewbrokerAccountDetailsModal">
            <h4 class="ui dividing header" id="modalbrokerAccountHeader">View broker Account Details</h4>


            <div class="ui basic segment"> 
                <form class ="ui form" id="brokerAccountDetailFormId" method="post" name="insertform" action="InsertBrokerAccount.php"> 
                    <!--<div class="ui segment">-->
                    <input type="hidden" id="brokerAccountId" name="view_ba_id" value=""/>
                    <div class="sixteen wide field">
                        <div class="ui segment">
                            <h4 class="ui dividing header">Account Details</h4>
                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <label>Account Name</label>
                                        <input type="text" id="view_ba_name" name="view_ba_name" placeholder="Account Name" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <label>Broker Name</label>
                                        <input type="text" id="view_brokerNameTextField" name="view_brokerNameTextField"/>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <label>Account Opening Date</label>
                                        <div class="ui icon input">
                                            <i class="calendar icon"></i>
                                            <input type="text" id="view_ba_accountOpenDate" name="view_ba_accountOpenDate" placeholder="Account Opening Date" onfocus="this.value = this.value;"/>
                                        </div>

                                    </div>
                                    <div class="field">
                                        <label>Account holder's Birthdate</label>
                                        <div class="ui icon input">
                                            <i class="calendar icon"></i>
                                            <input type="text" id="view_ba_birthDate" name="view_ba_birthDate" placeholder="Account Holder's Birth Date" onfocus="this.value = this.value;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <label>Pan card number</label>
                                        <input type="text" id="view_ba_panCardNumber" name="view_ba_panCardNumber" placeholder="Pan Card No" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <label>Email id</label>
                                        <input type="text" id="view_ba_email" name="view_ba_email" placeholder="Email" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">User Details</h4>
                            <div class="field">
                                <div class="three fields">
                                    <div class="field">
                                        <label>User Id</label>
                                        <input type="text" id="view_ba_userId" name="view_ba_userId" placeholder="UserId" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <label>Login Password</label>
                                        <input type="text" id="view_ba_loginPassword" name="view_ba_loginPassword" placeholder="Login Password" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <label>Transaction Password</label>
                                        <input type="text" id="view_ba_transactionPassword" name="view_ba_transactionPassword" placeholder="Transaction Password" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>

                                <div class="two fields">
                                    <div class="field">
                                        <label>Partner Code</label>
                                        <input type="text" id="view_ba_partnerCode" name="view_ba_partnerCode" placeholder="Partner Code" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <label>Client Code</label>
                                        <input type="text" id="view_ba_clientCode" name="view_ba_clientCode" placeholder="Client Code" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>

                                <div class="two fields">
                                    <div class="field">
                                        <label>DP ID</label>
                                        <input type="text" id="view_ba_dpId" name="view_ba_dpId" placeholder="DP ID" onfocus="this.value = this.value;"/>
                                    </div>
                                    <div class="field">
                                        <label>BO ID</label>
                                        <input type="text" id="view_ba_boId" name="view_ba_boId" placeholder="BO ID" onfocus="this.value = this.value;"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">Notes</h4>
                            <div class="field">
                                <textarea rows="2" id="view_ba_notes" name="view_ba_notes"></textarea>
                            </div>
                        </div>
                    </div>




                    <div class="sixteen wide field">
                        <input class="ui button" type="button" value="Close" onclick="closeAddBrokerAccount()">
                    </div>
                </form>
            </div>
        </div>


    </body>
</html>
