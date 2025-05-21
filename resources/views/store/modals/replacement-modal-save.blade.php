<div class="card-body">
    <div class="modal bd-example-modal-lg" id="modal_body_save"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Replacement Slip Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class=" col-md-12">
                        <div class="mb-9">
                            
                            <div class="">
                                <div class="col-md-12 mt-3">
                                    <div class="row">
                                        <div id="div_unit" class="col-md-6 mb-1" style="display: none;">
                                            <strong><label for="validationCustom04">Unit:&nbsp;</label></strong><label id="label_unit" for="validationCustom04"></label>

                                        </div>
                                        <div id="div_srp" class="col-md-6 mb-1" style="display: none;">
                                            <strong><label for="validationCustom04">SRP:&nbsp;</label></strong><label id="label_srp" for="validationCustom05">&nbsp;</label>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <strong><label>SREP No.*:</label></strong>
                                            <input type="number" id="slip_no" style="border-color: rgb(0, 0, 0);" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong><label>Date of replacement*:</label></strong>
                                            <input type="date" id="slip_date" style="border-color: rgb(0, 0, 0);" class="form-control">
                                        </div>
                                        {{-- <div class="col-md-4 mb-3">
                                            <strong><label>Additional Amount*:</label></strong>
                                            <input id="slip_no" style="border-color: rgb(0, 0, 0);" class="form-control">
                                        </div> --}}
                                        <div class="col-md-12 mb-3">
                                            <Strong>Reason for Replacement:</Strong>
                                            <textarea class="form-control" id="slip_remarks" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--   <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".show-replaced-item">View</button>-->
                        <button type="button" id="replacement_submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <button id="save" type="button" class="btn btn-success">Save</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>