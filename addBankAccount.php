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
                $('#select').dropdown({
                    onChange: function () {
                        console.log('change');
                        $('#bankNameTextField').css('color', '#202020');
                    }
                });
                
                $('#selectMonth').dropdown({
                    onChange: function () {
                        console.log('change');
                        $('#bankNameTextField').css('color', '#202020');
                    }
                });
                
                $('#selectYear').dropdown({
                    onChange: function () {
                        console.log('change');
                        $('#bankNameTextField').css('color', '#202020');
                    }
                });
                
                $('.ui.modal').modal();
            });

            function closeAddBankAccount() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function addBankAccount() {
                $('#bankAccountTextField').val("");
                $('#bankAccountId').val("");
                $('#modalBankAccountHeader').html("Add Bank Account");
                $('#submitBankAccountButton').val("Add");
                showBankAccountModal();
            }

            function editBankAccount(bankId, bankName) {
                $('#bankAccountTextField').val(bankName);
                $('#bankAccountId').val(bankId);
                $('#modalBankAccountHeader').html("Edit Bank Account");
                $('#submitBankAccountButton').val("Update");
                showBankAccountModal();
            }

            function showBankAccountModal() {
                $('#AddBankAccountModal')
                        .modal('setting', 'transition', 'vertical flip')
                        .modal('show');
            }
        </script>

        <style type="text/css">
            #bankNameTextField {
                color: #969696;
            }
        </style>
    </head>
    <body>

        <?php
        include_once 'TO_Bank.php';
        $bankTableOperation = new TO_Bank();
        ?>


        <div class="ui small modal" id="AddBankAccountModal">
            <h4 class="ui dividing header" id="modalBankAccountHeader">Add Bank Account</h4>


            <div class="ui basic segment"> 
                <form class ="ui form" id="bankAccountFormId" method="post" name="insertform" action="InsertBankAccount.php"> 
                    <!--<div class="ui segment">-->
                    <input type="hidden" id="bankAccountId" name="ba_id" value=""/>
                    <div class="sixteen wide field">
                        <div class="ui segment">
                            <h4 class="ui dividing header">Bank Details</h4>
                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" id="bankAccountTextField" name="ba_holderName" placeholder="Account Holder Name" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>
                                    <div class="field">
                                        <div class="ui selection dropdown" id="select">
                                            <input type="hidden" name="b_id" id="bankCodeTextField">
                                            <i class="dropdown icon"></i>
                                            <div class="text" id="bankNameTextField" style="">Select Bank Name</div>
                                            <div class="menu">

                                                <?php foreach ($bankTableOperation->read() as $obj) { ?>
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
                                        <input type="text" id="bankAccountTextField" name="ba_accountNumber" placeholder="Account Number" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>
                                    <div class="field">
                                        <input type="text" id="bankAccountTextField" name="ba_ifsc" placeholder="IFSC Code" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="ui segment">
                            <h4 class="ui dividing header">Netbanking Details</h4>
                            <div class="field">
                                <div class="three fields">
                                    <div class="field">
                                        <input type="text" id="bankAccountTextField" name="ba_netBankingUserName" placeholder="Username" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>
                                    <div class="field">
                                        <input type="text" id="bankAccountTextField" name="ba_netBankingLoginPwd" placeholder="Login Password" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>

                                    <div class="field">
                                        <input type="text" id="bankAccountTextField" name="ba_netBankingTransactionPwd" placeholder="Transaction Password" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">ATM Details</h4>
                            <div class="field">
                                <div class="two fields">
                                    <div class="field">
                                        <label></label>
                                        <input type="text" id="bankAccountTextField" name="ba_atmCardNumber" placeholder="Card Number" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>




                                    <div class="field">
                                        <input type="text" id="bankAccountTextField" name="ba_atmCvv" placeholder="CVV" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="two fields">
                                        <div class="field">
                                            <input type="text" id="bankAccountTextField" name="ba_atmPaymentPwd" placeholder="Payment Password" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                        <div class="field">
                                            <input type="text" id="bankAccountTextField" name="ba_atmPin" placeholder="PIN" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="ui basic segment">
                                        <h4 class="ui dividing header">Expiry Date</h4>
                                        <div class="two fields">
                                            <div class="field">
                                                <div class="ui selection dropdown" id="selectMonth">
                                                    <input type="hidden" name="ba_atmExpiryMonth" id="bankCodeTextField">
                                                    <i class="dropdown icon"></i>
                                                    <div class="text" id="ba_atmExpiryMonth" style="">Month</div>
                                                    <div class="menu">
                                                        <?php for($x = 1; $x < 13; $x++) { ?>
                                                            <div class = "item" data-value = <?php echo $x ?> > <?php echo $x ?> </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="ui selection dropdown" id="selectYear">
                                                    <input type="hidden" name="ba_atmExpiryYear" id="bankCodeTextField">
                                                    <i class="dropdown icon"></i>
                                                    <div class="text" id="ba_atmExpiryYear" name="ba_atmExpiryYear" style="">Year</div>
                                                    <div class="menu">
                                                        <?php for($x = 2017; $x < 2061; $x++) { ?>
                                                            <div class = "item" data-value = <?php echo $x ?> > <?php echo $x ?> </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <h4 class="ui dividing header">Mobile App Details</h4>
                            <div class="field">
                                <input type="text" id="bankAccountTextField" name="ba_mobileAppPin" placeholder="Application PIN" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">Notes</h4>
                            <div class="field">
                                <textarea rows="2" name="ba_notes"></textarea>
                            </div>
                        </div>

                    </div>




                    <div class="sixteen wide field">
                        <input class="ui primary button" id="submitBankAccountButton" type="submit" name="send" value="Add" id="inputid">
                        <input class="ui button" type="button" value="Cancel" onclick="closeAddBankAccount()">
                    </div>



                </form>
            </div>
        </div>


    </body>
</html>
