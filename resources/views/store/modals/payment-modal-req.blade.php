<div class="modal" id="return_modal_body"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Other Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">

                    <div class="col-md-6 mb-3">
                        <label for="recipient-name" class="col-form-label">O.R No *:</label>
                        <input type="text" class="form-control" id="other_payment_or_no">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="recipient-name" class="col-form-label">O.R Date *:</label>
                        <input type="date" class="form-control" id="other_payment_date">
                    </div>

                </div>


                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Amount *:</label>
                    <input type="number" class="form-control" id="input_amount">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Other Payment *:</label>
                    <input type="number" class="form-control" id="other_payment_other_payment">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Other Payment Description:</label>
                    <textarea class="form-control" id="other_payment_description"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Remarks:</label>
                    <textarea class="form-control" id="payment_remarks"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-success submit_payment" >Submit</button>
            </div>


            </div>
        </div>
    </div>
</div>
