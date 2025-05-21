<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Vallery Enterprises</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
 
     <!--common style-->
    {{-- <link href="public/css2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css2/vendor/lobicard/css/lobicard.css" rel="stylesheet">
    <link href="public/css2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css2/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="public/css2/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">



    <!--custom css-->
    <link href="public/css2/css/main.css" rel="stylesheet">

    <!--custom select 2-->
    <link href="public/css2/vendor/select2/css/select2.css" rel="stylesheet"> --}}
  
      <meta name="csrf-token" content="{{ csrf_token() }}" />

      <!--google font-->
    <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!--jquery append-->
<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<!--common style-->
<link href="public/css2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css2/vendor/lobicard/css/lobicard.css" rel="stylesheet">
<link href="public/css2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="public/css2/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<link href="public/css2/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
<link href="public/css2/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">



<!--custom css-->
<link href="public/css2/css/main.css" rel="stylesheet">

<!--custom select 2-->
<link href="public/css2/vendor/select2/css/select2.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="assets/vendor/html5shiv.js"></script>
<script src="assets/vendor/respond.min.js"></script>
<![endif]-->
    
</head>
<body>
    
    <div class="">
       
    </div>
    
    <div class="">
        <br>
 @if(Session::has('success'))
 <div class="alert alert-success">
     {{Session::get('success')}}
 </div>
 @endif
        <form action="orders" method="POST">
            {{ csrf_field() }}
            <section>
                <div class="panel panel-header">
   
                    <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="customer_name" class="text-uppercase form-control" placeholder="Account Name *" required="">
                        </div></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="customer_address" class="text-uppercase form-control" placeholder="Address *" required="">
                        </div></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="customer_contact_person" class="text-uppercase form-control" placeholder="Contact Person *" required="">
                            </div></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="customer_contact_number" class="form-control" placeholder="CONTACT NUMBER *" required="">
                                </div></div>
                    </div>

                    <div class="row">
                        
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="remarks" class="text-uppercase form-control" placeholder="Remarks *" required="">
                    </div>
                </div>
                    
                    
                        

                </div>

                </div>
                

                <div class="panel panel-footer" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="border: none">Product Name</th>
                                <th style="border: none">Qty</th>
                                <th style="border: none">Unit</th>
                                <th style="border: none">Price</th>
                                <th style="border: none">{{-- <a href="#" id="add-product" class="btn btn-primary shadow btn-l sharp mr-1"><i class="fa fa-cart-plus"></i></a> --}}<button type="button" id="add-product" class="btn btn-primary">Add Product</button></th>
                            </tr>
                        </thead>                
                        <tbody id="product-group">
            <tr id="product_id" class="item">
            
              <td style="border: none">
            
                <select name="product_name[]"  class="form-control" id="option_s2" required >
                    <option value=""> -- Select One --</option>
                    
                    {{-- <option value="{{ $product->product_name }}"> {{ $product->product_name }} </option> --}}
                  
                    @foreach ($productlists as $product)
                        <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
              
            
            
              </td>

              <td style="border: none"><input type="number" name="quantity[]" class="form-control quantity" required=""></td>

              <td style="border: none"><select data-live-search="true" type="text" name="unit[]" class="form-control quantity" required="">
                <option value=""> -- Select One --</option>
                <option value="PC.">PC.</option>
                <option value="ROLL.">ROLL.</option>
                <option value="UNIT.">UNIT.</option>
                <option value="BX.">BX.</option>
                <option value="BOT.">BOT.</option>
                <option value="K.">K.</option>
                <option value="SET.">SET.</option>
                <option value="GAL.">GAL.</option>
                <option value="VIAL.">VIAL.</option>
                <option value="SAC.">SAC.</option>
                <option value="CAN.">CAN.</option>
                <option value="DOZ.">DOZ.</option>
                <option value="TUBE.">TUBE.</option>
                <option value="PAIR.">PAIR.</option>
                <option value="TRAY.">TRAY.</option>
                <option value="CYL.">CYL.</option>
                <option value="PACK.">PACK.</option>
                <option value="JAR.">JAR.</option>
                <option value="BTL.">BTL.</option>
                <option value="S.">S.</option>
                <option value="LTR.">LTR.</option>
                <option value="CASE.">CASE.</option>
                <option value="PAD.">PAD.</option>
                <option value="LITER.">LITER.</option>
                <option value="BAR.">BAR.</option>
                <option value="PAIL.">PAIL.</option>
                <option value="YARD.">YARD.</option>
            </select></td>
              <td style="border: none"><input type="text" name="amount[]" class="form-control dropdown"></td>
            
                
                
                


              </td>
            <td style="border: none"><a href="#" class="remove btn btn-danger shadow btn-l sharp mr-1"><i class="fa fa-trash"></i></a></td>
            </tr>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        </form>
   </div>

   <script type="text/javascript">

/* var product_counter = 2; */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var accountname = $("input[name=accountname]").val();
        var address = $("input[name=address]").val();
        var contactperson = $("input[name=contactperson]").val();
        var contactnumber = $("input[name=contactnumber]").val();
        var url = '{{ url('purchasePost') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
            accountname:accountname, 
            address:address,
            contactperson:contactperson,
            contactnumber:contactnumber
                },
           success:function(response){
              if(response.success){
                  alert(response.message)
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});
    

    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var tr='<tr>'+
        '<td style="border: none"><select name="product_name[]" class="form-control" data-live-search="true" required=""><option value=""> -- Select One --</option>@foreach ($productlists as $product)<option value="{{ $product->product_name }}">{{ $product->product_name }}</option>@endforeach </select></td>'+
        '<td style="border: none"><input type="number" name="quantity[]" class="form-control quantity" required=""></td>'+
        '<td style="border: none"><select data-live-search="true" type="text" name="unit[]" class="form-control quantity" required=""><option value=""> -- Select One --</option><option value="PC.">PC.</option><option value="ROLL.">ROLL.</option><option value="UNIT.">UNIT.</option><option value="BX.">BX.</option><option value="BOT.">BOT.</option><option value="K.">K.</option><option value="SET.">SET.</option><option value="GAL.">GAL.</option><option value="VIAL.">VIAL.</option><option value="SAC.">SAC.</option><option value="CAN.">CAN.</option><option value="DOZ.">DOZ.</option><option value="TUBE.">TUBE.</option><option value="PAIR.">PAIR.</option><option value="TRAY.">TRAY.</option><option value="CYL.">CYL.</option><option value="PACK.">PACK.</option><option value="JAR.">JAR.</option><option value="BTL.">BTL.</option><option value="S.">S.</option><option value="LTR.">LTR.</option><option value="CASE.">CASE.</option><option value="PAD.">PAD.</option><option value="LITER.">LITER.</option><option value="BAR.">BAR.</option><option value="PAIL.">PAIL.</option><option value="YARD.">YARD.</option></select></td>'+
        
        '<td style="border: none"><input type="number" name="amount[]" class="form-control quantity"></td>'+
        '<td style="border: none"><a href="#" class="remove btn btn-danger shadow btn-l sharp mr-1"><i class="fa fa-trash"></i></a></td>'+
        '</tr>';
        $('tbody').append(tr);
    };
    $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }
    
    });
</script>
    <!-- Placed js at the end of the page so the pages load faster -->
    <script src="public/css2/vendor/jquery/jquery.min.js"></script>
    <script src="public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="public/css2/vendor/popper.min.js"></script>
    <script src="public/css2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
    <script src="public/css2/vendor/lobicard/js/lobicard.js"></script>
    <script class="include" type="text/javascript" src="public/css2/vendor/jquery.dcjqaccordion.2.7.js"></script>
    <script src="public/css2/vendor/jquery.scrollTo.min.js"></script>



    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--init scripts-->
    <script src="public/css2/js/scripts.js"></script>

    <!--select2-->
    <script src="public/css2/vendor/select2/js/select2.min.js"></script>
    <script src="public/css2/vendor/select2-init.js"></script>
</body>
</html>