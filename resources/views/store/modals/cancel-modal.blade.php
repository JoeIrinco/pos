<div class="modal bd-example-modal-sm" id="cancel-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label hidden id="transaction_id"></label>
                <div class="col-md-12 mb-3">
                    <strong><label for="validationCustom05">Cancellation Date:</label></strong>
                    <input class="form-control" type="date" id="cancel_date" placeholder="MM/DD/YYYY" onchange="handler(event);"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="save btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>






<div class="card-body">
    <div class="modal bd-example-modal-sm" id="cancel-modal"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-body">
                    <div class=" col-md-12">
                        <div class="mb-4">
                            <input type="hidden" name="_token" id="_token"  value="{{ csrf_token() }}">
                            <div class="row">
                                <div id="div_third" class=" col-md-12">
                                    <div class="row">
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
