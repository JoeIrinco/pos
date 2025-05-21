<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Critical Product List Inventory</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        </style>
</head>

<body>
    <h3>VALLERY ENTERPRISES STORE NEARLY EXPIRE PRODUCT INVENTORY</h3>    
    
<p>Date Print: {{$now}}</p>
<p>Total count: {{$BaseDetailscount}}</p>

        <table style="width: 100%;" cellspacing="0" align="center" >
            <thead>
            <tr>
                <th>Quantity</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>PO</th>
                <th>Invoice</th>
                <th>Lot</th>
                <th>Location</th>
                <th>Expiration Date</th>
                <th>Date Order</th>
                <th>Date Recieved</th>
                 
               
                
            </tr>
            </thead>

            <tbody>
        
                @foreach ($data as $value)
                <tr>                    
                    <td style="font-size: 12px;">{{$value['quantity']}}</td>
                    <td style="font-size: 12px;">{{$value['product_code']}}</td>
                    <td style="font-size: 12px;">{{$value['productname']}}</td>
                    <td style="font-size: 12px;">{{$value['po_no']}}</td>
                    <td style="font-size: 12px;">{{$value['invoice_num']}}</td>
                    <td style="font-size: 12px;">{{$value['lot_no']}}</td>
                    <td style="font-size: 12px;">{{$value['location_address']}}</td>
                    <td style="font-size: 12px;">{{$value['expiration_date']}}</td>
                    <td style="font-size: 12px;">{{$value['order_date']}}</td>
                    <td style="font-size: 12px;">{{$value['receive_date']}}</td>
                   
                 </tr>
                @endforeach
             
               
                
           
            </tbody>
        </table>

</body>
</html>