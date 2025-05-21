<div class="modal fade receiveProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Receive Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" id="product_form_set" method="POST"  enctype="multipart/form-data" novalidate>
                    <input type="hidden" value="" id="product_id">
                    @csrf
                    <div class="col-md-4">
                        <label for="po_num">Expiration Date</label>                       
                        <div class="ccol-md-4 mb-3">
                            <div class="input-group date dpYears" data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="{{$now}}">
                                <input type="text" class="form-control exp_date" id="exp_date" placeholder="{{$now}}" aria-label="Right Icon" aria-describedby="dp-ig">
                                <div class="input-group-append">
                                    <button id="dp-ig" class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form_location col-md-12">
                     
                    </div>                                                                                                
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success pull-left add_location" id="add_location">
                                <i class="fa fa-plus"></i> Add to other Location
                            </button>
                    
                            <button type="button" class="btn btn-dark pull-right set_location" id="set_location">
                                <i class=" icon-cursor pr-1"></i> Set Details
                            </button>
                        </div>

                    </div>
                   
                </form>
                   
                    
          
            </div>

        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
      $('body').on('keyup', '.rock_po', function() { 
        $(this).val($(this).val().toUpperCase());
         });
         $('body').on('keyup', '.sheft_po', function() { 
        $(this).val($(this).val().toUpperCase());
         });
        var token = "{{csrf_token()}}";
        $("#set_location").click(function( event ) {  
            var qty_checker_add=0;
            var qty_checker_edit=0;
            var counter = 0;                             
            var po_num = $('#po_num').val();
            var product_id = $('#product_id').val();
            var exp_date = $('#exp_date').val();
            
            var location = $('.location_po');           
            var qunatity = $('.qunatity_po');
            var sheft = $('.sheft_po');
            var rock = $('.rock_po');
                     
            var location_array = [];
            var exp_date_array = [];
            var qunatity_array = [];
            var sheft_po_array = [];
            var rock_po_array = [];




          

            for(var i = 0; i < sheft.length; i++){
                  var g_data=$(sheft[i]).val();
                  sheft_po_array.push(g_data);
                  if(g_data==""){                    
                    $(sheft[i]).css("border","1px solid red");
                    counter++;
                  }else{
                    $(sheft[i]).removeAttr("style");
                  }
            }
            for(var i = 0; i < rock.length; i++){
                  var g_data=$(rock[i]).val();
                  rock_po_array.push(g_data);
                  if(g_data==""){                    
                    $(rock[i]).css("border","1px solid red");
                    counter++;
                  }else{
                    $(rock[i]).removeAttr("style");
                  }
            }

            for(var i = 0; i < location.length; i++){
                  var g_data=$(location[i]).val();
                  location_array.push(g_data);
                  if(g_data==""){                    
                    $(location[i]).css("border","1px solid red");
                    counter++;
                  }else{
                    $(location[i]).removeAttr("style");
                  }
            }
            

            for(var i = 0; i < qunatity.length; i++){
                  var g_data=$(qunatity[i]).val();
                  qty_checker_add = parseInt(qty_checker_add) + parseInt(g_data);
                  qunatity_array.push(g_data);
                  if(g_data==""){
                    
                    $(qunatity[i]).css("border","1px solid red");
                    counter++;
                  }else{
                    $(qunatity[i]).removeAttr("style");
                  }
            }

            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
               type:'POST',
               url:'{{ url('inventory/set-product-details') }}',
               data:
               {
                token:token,
                product_id,
                location_array,
                exp_date,
                qunatity_array,
                po_num,
                sheft_po_array,
                rock_po_array,
 
                },
               success:function(data){
                swal({
                        title: 'Success!',
                        text: 'Successfully Set',
                        timer: 1500,
                        type: "success",
                    }, function () {
                        $('.receiveProduct').modal('toggle');
                    });

               
              },
              error: function(){
                alert("Error: Server encountered an error. Please try again or contact your system administrator.");
              }
            });
        
         
        });
    });
</script>