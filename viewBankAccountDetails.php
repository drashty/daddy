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
                $("#bankAccountDetailFormId :input").prop('readonly', true);
                $('.ui.modal').modal();
            });

            function closeBankAccountDetails() {
                $('.ui.modal').modal('hide');
                return false;
            }

            function showBankAccountDetailsModal(accountName, bankName, accountNumber, IFSC, nbUserName, nbLoginPassword, nbTransactionPassword, atmCardNumber, atmCVV, atmPaymentPwd, atmPin, atmExpiryMonth, atmExpiryYear, mobileAppPin, notes) {
                $('#bankAccountHolderNameTextField').val(accountName);
                $('#bankAccountNameTextField').val(bankName);
                $('#bankAccountNumberTextField').val(accountNumber);
                $('#bankIFSCTextField').val(IFSC);
                $('#netBankingUserNameTextField').val(nbUserName);
                $('#netBankingLoginPwd').val(nbLoginPassword);
                $('#netBankingTransactionPwd').val(nbTransactionPassword);
                $('#atmCardNumberTextField').val(atmCardNumber);
                $('#atmCVVTextField').val(atmCVV);
                $('#atmPaymentPwd').val(atmPaymentPwd);
                $('#atmPinTextField').val(atmPin);
                $('#atmExpiryMonth').val(atmExpiryMonth);
                $('#atmExpiryYear').val(atmExpiryYear);
                $('#mobilePin').val(mobileAppPin);
                $('#ba_AccountDetailnotes').val(notes);

                $('#ViewBankAccountDetailsModal')
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


        <div class="ui small modal" id="ViewBankAccountDetailsModal">
            <h4 class="ui dividing header" id="modalBankAccountHeader">View Bank Account Details</h4>


            <div class="ui basic segment"> 
                <form class ="ui form" id="bankAccountDetailFormId" method="post" name="insertform" action="InsertBankAccount.php"> 
                    <!--<div class="ui segment">-->
                    <input type="hidden" id="bankAccountId" name="ba_id" value=""/>
                    <div class="sixteen wide field">
                        <div class="ui segment">
                            <h4 class="ui dividing header">Bank Details</h4>
                            <div class="ui segment">
                                <div class="field">
                                    <div class="two fields">
                                        <div class="field">
                                            <label>Account Name</label>
                                            <input type="text" id="bankAccountHolderNameTextField" name="ba_holderName" placeholder="Account Holder Name" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                        <div class="field">
                                            <label>Bank Name</label>
                                            <input type="text" id="bankAccountNameTextField" name="b_name" placeholder="Select Bank"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="field">
                                    <div class="two fields">
                                        <div class="field">
                                            <label>Account Number</label>
                                            <input type="text" id="bankAccountNumberTextField" name="ba_accountNumber" placeholder="Account Number" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                        <div class="field">
                                            <label>IFSC Code</label>
                                            <input type="text" id="bankIFSCTextField" name="ba_ifsc" placeholder="IFSC Code" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="ui segment">
                            <h4 class="ui dividing header">Netbanking Details</h4>
                            <div class="ui segment">
                                <div class="field">
                                    <div class="three fields">
                                        <div class="field">
                                            <label>Username</label>
                                            <input type="text" id="netBankingUserNameTextField" name="ba_netBankingUserName" placeholder="Username" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                        <div class="field">
                                            <label>Login Password</label>
                                            <input type="text" id="netBankingLoginPwd" name="ba_netBankingLoginPwd" placeholder="Login Password" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>

                                        <div class="field">
                                            <label>Transaction Password</label>
                                            <input type="text" id="netBankingTransactionPwd" name="ba_netBankingTransactionPwd" placeholder="Transaction Password" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">ATM Details</h4>
                            <div class="ui segment">

                                <div class="field">
                                    <div class="two fields">
                                        <div class="field">
                                            <label>Card Number</label>
                                            <input type="text" id="atmCardNumberTextField" name="ba_atmCardNumber" placeholder="Card Number" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>




                                        <div class="field">
                                            <label>CVV</label>
                                            <input type="text" id="atmCVVTextField" name="ba_atmCvv" placeholder="CVV" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="two fields">
                                            <div class="field">
                                                <label>Payment Password</label>
                                                <input type="text" id="atmPaymentPwd" name="ba_atmPaymentPwd" placeholder="Payment Password" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                            </div>
                                            <div class="field">
                                                <label>Pin</label>
                                                <input type="text" id="atmPinTextField" name="ba_atmPin" placeholder="PIN" onfocus="this.value = this.value;" value= '<?php echo $result->b_name ?>'/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui basic segment">
                                            <h4 class="ui dividing header">Expiry Date</h4>
                                            <div class="two fields">
                                                <div class="field">
                                                    <label>Month</label>
                                                    <input type="text" id="atmExpiryMonth" name="ba_atmExpiryMonth"/>
                                                </div>
                                                <div class="field">
                                                    <label>Year</label>
                                                    <input type="text" id="atmExpiryYear" name="ba_atmExpiryYear"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ui segment">
                            <h4 class="ui dividing header">Mobile App Details</h4>
                            <div class="ui segment">
                                <div class="field">
                                    <label>Application Pin</label>
                                    <input type="text" id="mobilePin" placeholder="Application PIN"/>
                                </div>
                            </div>
                        </div>


                        <div class="ui segment">
                            <h4 class="ui dividing header">Notes</h4>
                            <div class="field">
                                <textarea rows="2" id="ba_AccountDetailnotes" name="ba_notes"></textarea>
                            </div>
                        </div>

                    </div>




                    <div class="sixteen wide field">
                        <input class="ui button" type="button" value="Close" onclick="closeBankAccountDetails()">
                    </div>



                </form>
            </div>
        </div>


    </body>
</html>
