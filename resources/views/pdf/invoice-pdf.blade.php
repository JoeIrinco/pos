<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PO Details</title>

    <style>
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
}
    </style>
</head>

<body>
    <h3 align="center">VALLERY ENTERPRISES STORE</h3>
    <h4 align="center">List of Receive Product</h4>

       
    <h3 style="margin:0;display:inline;float:left">Invoice # {{$id}}</h3>
<br><br><br>
    <div>
        <table width="100%" id="customers"  cellspacing="0">
            <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>                              
                <th>Unit Price</th>
                <th>Quantity</th>  
                <th>Extended Price</th>
                <th>Expiration</th>
            </tr>
            </thead>

            <tbody>
        
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->productName}}</td>
                    <td>{{$data->productcode}}</td>                   
                    <td>{{$data->price}}</td>
                    <td>{{$data->qty}}</td>
                    <td>{{$data->Tprice}}</td>
                    <td>{{$data->exp}}</td>
                 
                 </tr>
                @endforeach
                <tr>
                    <td colspan="6" style="text-align:center;">
                        '---nothing follows---'
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right;">
                       <h5> Total Amount {{number_format($totalPriceData,2)}}</h5>
                    </td>
                    
                </tr>
               
           
           
            </tbody>
        </table>
    </div>
</body>
</html>