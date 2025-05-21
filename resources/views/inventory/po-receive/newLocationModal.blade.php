<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">New Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    
                   
                        <form  method="POST"  class="container" id="LocationForm" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
              

                                <div class="col-md-6 mb-3">
                                    <label for="brand_add">Lot No</label>
                                    <input type="text" class="form-control" id="lot_no_manual" name="lot_no" placeholder="Lot No" value="" >
                                    <div class="invalid-feedback">
                                        Please provide a valid Lot No.
                                    </div>
                                </div>                        
                            
                                <div class="col-md-6 mb-3">
                                    <label for="productname_add">Rack</label>
                                    <input type="text" class="form-control"  id="Rack_manual" name="Rack" placeholder="Rack" >
                                    <div class="invalid-feedback">
                                        Please provide a valid Rack.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="product_description_add">Shelf</label>
                                    <input type="text" class="form-control" name="Shelf" id="Shelf_manual" placeholder="Shelf" >
                                    <div class="invalid-feedback">
                                        Please provide a valid Product description.
                                    </div>
                                </div>                            
                                                                                                                              
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                   
                    
                </div>
            </div>
            <div class="modal-footer">
              {{--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $("input[type=text]").keyup(function () {  
            $(this).val($(this).val().toUpperCase());  
        });
        
            //$('body').on('submit', '#LocationForm', function (event) {
                
            $("#LocationForm").submit(function(e) {
            e.preventDefault();
            console.log('Location Add submitting...');
            $.ajax({
                url: "{{ url('inventory/insert-locatio-2') }}",
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.send-loading').show();
                },
                success: function (response) {
                   
                    $('.send-loading').hide();
                    swal({
                        title: 'Success!',
                        text: 'Successfully Added',
                        timer: 1500,
                        type: "success",
                    }, function () {
 
                    });

                    if(response !="joe"){
                            response=  response.replace('joe','')
                            
                            const myArray = response.split("-");
                            for (let index = 0; index < myArray.length; index++) {
                           console.log(myArray[index]);
                           if(myArray[index] == "rock_po"){
                                $('.rack_class').select2('destroy');
                               if($('#Rack_manual').val()!=""){
                               $('.rack_class').append($('<option>', {
                                   value: $('#Rack_manual').val(),
                                   text: $('#Rack_manual').val()
                               }));
                               $('.rack_class:last').val($('#Rack_manual').val()).change();
                               $('.rack_class').select2();
                                                             
                            }
                           } 
                           if(myArray[index] == "lot_no"){
                            $('.lot_class').select2('destroy');
                               if($('#lot_no_manual').val()!=""){
                               $('.lot_class').append($('<option>', {
                                   value: $('#lot_no_manual').val(),
                                   text: $('#lot_no_manual').val()
                               }));
                               $('.lot_class:last').val($('#lot_no_manual').val()).change();
                               $('.lot_class').select2();
                                                             
                            }
                           }                           
                           if(myArray[index] == "shelf_po"){
                            $('.shelf_class').select2('destroy');
                               if($('#Shelf_manual').val()!=""){
                                   $('.shelf_class').append($('<option>', {
                                       value: $('#Shelf_manual').val(),
                                       text: $('#Shelf_manual').val()
                                   }));
                                   $('.shelf_class').append($('<option>', {
                                       value: $('#Shelf_manual').val(),
                                       text: $('#Shelf_manual').val()
                                   }));

                                   $('.shelf_class:last').val($('#Shelf_manual').val()).change();
                                   $('.shelf_class').select2();
                               }
                           }            
                           
                       }

                       $('#Rack_manual').val("");
                       $('#lot_no_manual').val("");
                       $('#Location_manual').val("");
                       $('#Shelf_manual').val("");
                        }

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
        });
    });
</script>