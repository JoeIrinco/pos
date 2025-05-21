<div class="card-body">
    <div class="modal bd-example-modal-lg" id="edit"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class=" col-md-12">
                        <div class="mb-4">

                            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">

                            <div class="row">


                                <div id="div_third" class=" col-md-12">
                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-0">
                                            <strong><label>Transaction Type:</label></strong>&nbsp;<u><label class="text-decoration: underline;"  id="display_transaction"></label></u>/<label class="text-decoration: underline;"  id="display_invoice_type"></label>
                                        </div>
                                        <div class="col-md-6 mb-0">
                                            <strong><label>Invoice No.:</label></strong>&nbsp;<label id="display_invoice_no"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-0">
                                            <strong><label>Account Name:</label></strong>&nbsp;<label id="display_client_name"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <strong><label>Total *:</label></strong>
                                            <input id="display_total" type="number" style="border-color: rgb(0, 0, 0);" class="form-control">
                                        </div>
                                        {{-- <div class="col-md-6 mb-0">
                                            <strong><label>Total:</label></strong>&nbsp;<label id="display_total"></label>
                                        </div> --}}
                                        {{-- <div class="col-md-6 mb-0">
                                            <strong><label>Remaining balance:</label></strong>&nbsp;<label id="display_balance"></label>
                                        </div> --}}
                                    </div>
                                    <div class="row">

                                        <div id="div_tin" style="display: none;" class="col-md-6 mb-3">
                                            <Strong><label>TIN *:</label></Strong>

<!--                                        <div class="input-group">
                                                <input id="nic" name="nic" style="border-color: rgb(0, 0, 0);" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                                <div class="input-group-append">

                                                </div>
                                            </div>-->
                                            <div class="input-group">
                                                <input id="nic" name="nic" style="border-color: rgb(0, 0, 0);" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                                <div class="input-group-append">
                                                    <button style="border-color: rgb(0, 0, 0);" type="button" class="not_applicable btn btn-outline-secondary">N/A</button>
                                                    <button style="border-color: rgb(0, 0, 0);" type="button" class="pending btn btn-outline-secondary">PENDING</button>
                                                </div>
                                            </div>
                                            <small class="form-text text-muted">Example : 123-456-789-000</small>
                                        </div>
                                        <div id="div_atc1" style="display: none;" class="col-md-3 mb-3">
                                            <Strong><label>ATC 1 *:</label></Strong>
                                            <select style="width:100%;" id="atcSelect1" class="form-control"  name="product_name[]">
                                                <option value=''>&#45;&#45; Select ATC &#45;&#45;</option>
                                                <option value='WI158'>WI158</option>
                                                <option value='WI640'>WI640</option>
                                                <option value='WC158'>WC158</option>
                                                <option value='WC640'>WC640</option>
                                            </select>
                                        </div>
                                        <div id="div_atc2" style="display: none;" class="col-md-3 mb-3">
                                            <Strong><label>ATC 2 *:</label></Strong>
                                            <select style="width:100%;" id="atcSelect2" class="form-control"  name="product_name[]">
                                                <option value=''>&#45;&#45; Select ATC &#45;&#45;</option>
                                                <option value='WV010'>WV010 5%</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-3">

                                            <strong><label>Payment Type:</label></strong>
                                            <input type="text" id="input_payment_method" class="text-uppercase form-control" hidden readonly>
                                            <input type="text" id="input_payment_status" class="text-uppercase form-control" hidden readonly>

                                            <select style="border-color: rgb(0, 0, 0);" id="payment_type" class="form-control" >
                                                <option value=''>SELECT TRANSACTION TYPE</option>
                                                <option value='value_cash'>CASH</option>
                                                <option value='value_check'>CHECK</option>
                                                <option value='value_debit'>CARD -> DEBIT</option>
                                                <option value='value_credit'>CARD -> CREDIT</option>
                                                <option value='value_gcash'>ONLINE PAYMENT -> GCASH</option>
                                                <option value='value_paymaya'>ONLINE PAYMENT -> PAYMAYA</option>
                                                <option value='value_deposit'>ONLINE PAYMENT -> DEPOSIT</option>
                                                <option value='value_online_transfer'>ONLINE PAYMENT -> ONLINE BANK TRANSFER</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="div_payment_type">
                                        <div class="row" >
                                            <label id="display_id" hidden></label>
                                            <label id="display_transaction_id" hidden></label>
                                            <div id="div_check_number" style="display: none;" class="col-md-4 mb-3">
                                                <Strong><label>Check Number *:</label></Strong>
                                                <input type="text" id="input_check_number" style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" >
                                            </div>
                                            <div id="div_bank" style="display: none;" class="col-md-4 mb-3">
                                                <strong><label>Bank *:</label></strong>

                                                <select style="border-color: rgb(0, 0, 0);" id="input_bank" class="form-control" >
                                                    <option value=''>-&#45;&#45;Select Bank -&#45;&#45;</option>
                                                    <option value='AUB (Asia United Bank Corporation)'>AUB (Asia United Bank Corporation)</option>
                                                    <option value='Banco De Oro (BDO Unibank, Inc.)'>Banco De Oro (BDO Unibank, Inc.)</option>
                                                    <option value='Bank of Commerce'>Bank of Commerce</option>
                                                    <option value='BPI (Bank of the Philippine Islands)'>BPI (Bank of the Philippine Islands)</option>
                                                    <option value='Chinabank (China Banking Corporation)'>Chinabank (China Banking Corporation)</option>
                                                    <option value='Citibank'>Citibank</option>
                                                    <option value='DBP (Development Bank of the Philippines)'>DBP (Development Bank of the Philippines)</option>
                                                    <option value='East West Banking Corporation'>East West Banking Corporation</option>
                                                    <option value='HSBC (The Hongkong and Shanghai Banking Corporation)'>HSBC (The Hongkong and Shanghai Banking Corporation)</option>
                                                    <option value='Landbank of the Philippines'>Landbank of the Philippines</option>
                                                    <option value='Maybank Philippines, Incorporated'>Maybank Philippines, Incorporated</option>
                                                    <option value='Metrobank Bank and Trust Company'>Metrobank Bank and Trust Company</option>
                                                    <option value='PBCOM (Philippine Bank of Communications)'>PBCOM (Philippine Bank of Communications)</option>
                                                    <option value='Philtrust Bank (Philippine Trust Company)'>Philtrust Bank (Philippine Trust Company)</option>
                                                    <option value='PNB (Philippine National Bank)'>PNB (Philippine National Bank)</option>
                                                    <option value='PS Bank'>PS Bank</option>
                                                    <option value='RCBC (Rizal Commercial Banking Corporation)'>RCBC (Rizal Commercial Banking Corporation)</option>
                                                    <option value='Robinsons Bank Corporation'>Robinsons Bank Corporation</option>
                                                    <option value='Security Bank Corporation'>Security Bank Corporation</option>
                                                    <option value='UCPB (United Coconut Planters Bank)'>UCPB (United Coconut Planters Bank)</option>
                                                    <option value='Unionbank of the Philippines'>Unionbank of the Philippines</option>
                                                    <option value='Veteransbank (Philippine Veterans Bank)'>Veteransbank (Philippine Veterans Bank)</option>
                                                    <option value='Other Bank'>-&#45;&#45; Other Bank -&#45;&#45;</option>
                                                </select>
                                            </div>
                                            <div id="div_other_bank" style="display: none;" class="col-md-4 mb-3">
                                                <strong><label>Bank Name *:</label></strong>
                                                <div class="input-group">
                                                    <input id="input_other_bank" style="border-color: rgb(0, 0, 0);" type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                                                    <div class="input-group-append">
                                                        <button style="border-color: rgb(0, 0, 0);" type="button" class="select_again btn btn-outline-secondary">Select</button>
                                                    </div>
                                                </div>

                                                <input type="text" id="input_other_bank_if_selected"  style="border-color: rgb(0, 0, 0);" class="text-uppercase form-control" readonly hidden>
                                            </div>
                                            <div id="div_check_date" style="display: none;" class="col-md-4 mb-3">
                                                <strong><label>Check Date *:</label></strong>
                                                <input id="input_check_date" type="date" style="border-color: rgb(0, 0, 0);" class="form-control" placeholder="MM/DD/YYYY">
                                            </div>
                                            <div id="div_reference_number" style="display: none;" class="col-md-4 mb-3">
                                                <strong><label>Reference Number *:</label></strong>
                                                <input id="input_ref" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                            </div>
                                            <div id="div_account_name" style="display: none;" class="col-md-4 mb-3">
                                                <strong><label>Account Name *:</label></strong>
                                                <input id="input_account_name" type="text" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                            </div>

                                        </div>
<!--                                        <div class="row" >
                                            <div id="div_amount" style="display: none;" class="col-md-4 mb-3">
                                                <strong><label>Amount *:</label></strong>
                                                <input id="input_amount" type="number" style="border-color: rgb(0, 0, 0);" class="form-control" >
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="save" type="button" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
