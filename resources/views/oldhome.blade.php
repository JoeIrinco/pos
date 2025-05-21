<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Vallery Enterprises</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

  
      <meta name="csrf-token" content="{{ csrf_token() }}" />
    
</head>
<body>
    
    <div class="container">
        @include('layouts.app')
    </div>
    
    <div class="container">
        <br>
 @if(Session::has('success'))
 <div class="alert alert-success">
     {{Session::get('success')}}
 </div>
 @endif
        <form action="/orders" method="POST">
            {{ csrf_field() }}
            <section>
                <div class="panel panel-header">
   
                    <div class="row">
                            <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="customer_name" class="form-control" placeholder="Account Name *">
                        </div></div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="customer_address" class="form-control" placeholder="Address *">
                        </div></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="customer_contact_person" class="form-control" placeholder="Contact Person *">
                            </div></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="customer_contact_number" class="form-control" placeholder="Contact Number *">
                                </div></div>
   
                    </div>
                </div>
                

                <div class="panel panel-footer" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
            <tr>
            <td style="border: none"><input type="text" name="product_name[]" class="form-control" required=""></td> 
              <td style="border: none"><input type="number" name="quantity[]" class="form-control quantity" required=""></td>
            <td style="border: none"><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
            </tr>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
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
        '<td style="border: none"><input type="text" name="product_name[]" class="form-control" required=""></td>'+
        '<td style="border: none"><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+
        '<td style="border: none"><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
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

   

</body>
</html>





    
 