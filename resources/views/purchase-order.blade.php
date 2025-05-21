<!DOCTYPE html>
<html>
<head>

    <title>Laravel 7 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{-- new start --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
{{-- new end --}}

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

 
    {{-- <div class="container">
        <h1>Ajax Data Insert</h1>
        <form action="" method="POST">

           <div class="form-group">
                <label>accountname:</label>
                <input type="text" name="accountname" class="form-control" placeholder="accountname" required="">

            </div>

            <div class="form-group">
                <label>address:</label>
                <input type="text" name="address" class="form-control" placeholder="address" required="">
            </div>

            <div class="form-group">
                <label>contactperson:</label>
                <input type="text" name="contactperson" class="form-control" placeholder="contactperson" required="">

            </div>

            <div class="form-group">
                <label>contactnumber:</label>
                <input type="text" name="contactnumber" class="form-control" placeholder="contactnumbers" required="">
            </div>

           
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>

        </form>
    </div> --}}


    

    <div class="container">
        <form>
            <section>
                <div class="panel panel-header">
   
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="customer_name" class="form-control" placeholder="Please enter your name">
                    </div></div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="customer_address" class="form-control" placeholder="Please enter your Address">
                    </div></div>
   
                </div></div>
                <div class="panel panel-footer" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Budget</th>
                                <th>Amount</th>
                                <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
            <tr>
            <td><input type="text" name="product_name[]" class="form-control" required=""></td>
            <td><input type="text" name="brand[]" class="form-control"></td>   
              <td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>
              <td><input type="text" name="budget[]" class="form-control budget"></td>
              <td><input type="text" name="amount[]" class="form-control amount"></td>
            <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
            </tr>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td>Total</td>
                                <td><b class="total"></b> </td>
                                <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        </form>
   </div>




</body>

<script type="text/javascript">


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
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});



    // new

    $('tbody').delegate('.quantity,.budget','keyup',function(){
        var tr=$(this).parent().parent();
        var quantity=tr.find('.quantity').val();
        var budget=tr.find('.budget').val();
        var amount=(quantity*budget);
        tr.find('.amount').val(amount);
        total();
    });
    function total(){
        var total=0;
        $('.amount').each(function(i,e){
            var amount=$(this).val()-0;
        total +=amount;
    });
    $('.total').html(total+".00 tk");   
    }
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var tr='<tr>'+
        '<td><input type="text" name="product_name[]" class="form-control" required=""></td>'+
        '<td><input type="text" name="brand[]" class="form-control"></td>'+
        '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
        '<td><input type="text" name="budget[]" class="form-control budget"></td>'+
        ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
        '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
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


    // end-new


</script>
</html> 