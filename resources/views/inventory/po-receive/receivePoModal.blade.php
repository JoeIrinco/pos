<div class="modal fade receivePoModal_form_joe" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Set of Invoice Number </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="po_num">Invoice Number</label>
                                <input type="text" class="form-control invoice_number" name="invoice_number" id="invoice_number" placeholder="Invoice number" value="" required>
                            <div class="invalid-feedback">
                                Please provide a Invoice Number.
                            </div>
                        </div>
                                                                                                               
                 
                        <div class="col-md-12 mb-3">
                            <button type="button" class="btn btn-success pull-left submit_invoice" data-dismiss="modal" id="submit_invoice2">
                               Set Invoice Number
                            </button>
                        </div>
                   

            </div>
            <div class="modal-footer">
              {{--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

</div>

<script>
    $( document ).ready(function() {
/* 
        $("#submit_invoice").click(function( event ) { 
            var invoice_number= $('#invoice_number').val()
            var po_num = $('#po_num').val();
            event.preventDefault();
            console.log('Product Add submitting...');
            $('.send-loading ').show();
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url: "{{ url('inventory/set-invoice') }}",
                type: 'POST',
                data: {
                    invoice_number,
                    po_num
                },
                success: function (response) {
                    console.log('Product Add submitting success...');                 
                    swal({
                        title: 'Success!',
                        text: 'Successfully Receive PO',
                        timer: 1500,
                        type: "success",
                    }, function () {
                        $('.addproduct_po').modal('toggle');
                    });

                },
                error: function (error) {
                    console.log('Product Add submitting error...');
                    console.log(error);
                    console.log(error.responseJSON.message);
                    $('.send-loading').hide();
                    swal({
                        title: 'Error!',
                        text: "Error Msg: " + error.responseJSON.message + "",
                        //timer: 1500,
                        type: "error",
                    })
                }
            });
        }); */
    });
</script>