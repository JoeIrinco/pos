<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List Inventory</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        </style>
</head>

<body>
    <h3>VALLERY ENTERPRISES STORE PRODUCT LIST INVENTORY</h3> 
    <h3>MANUAL ADD</h3>    
<p>Date Print: {{$now}}</p>
<p>Total count: {{$BaseDetailscount}}</p>

        <table style="width: 100%;" cellspacing="0" align="center" >
            <thead>
            <tr>
                <th>Process By</th>
                <th>Quantity</th>
                <th>Invoice Number</th>
                <th>PO Number</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Unit</th>
                <th>Lot no</th>
                <th>Expiration Date</th>
                <th>Location</th>
                <th>Rack</th>
                <th>Shelf</th>  
                <th>Transaction Type</th>                   
               
                
            </tr>
            </thead>

            <tbody>
        
                @foreach ($data as $value)
                <tr>
                    
                    <td style="font-size: 12px;">{{$value['name']}}</td>
                    <td style="font-size: 12px;">{{$value['quantity']}}</td>
                    <td style="font-size: 12px;">{{$value['invoice_num']}}</td>
                    <td style="font-size: 12px;">{{$value['po_id']}}</td>
                    <td style="font-size: 12px;">{{$value['product_code']}}</td>                 
                    <td style="font-size: 12px;">{{$value['productname']}}</td>
                    <td style="font-size: 12px;">{{$value['brand']}}</td>
                    <td style="font-size: 12px;">{{$value['unit']}}</td>
                    <td style="font-size: 12px;">{{$value['lot_no']}}</td>
                    <td style="font-size: 12px;">{{$value['location']}}</td>
                    <td style="font-size: 12px;">{{$value['rack']}}</td>
                    <td style="font-size: 12px;">{{$value['shelf']}}</td>
                    <td style="font-size: 12px;">{{$value['exp']}}</td>
                    <td style="font-size: 12px;">{{$value['transaction_type']}}</td>

                 </tr>
                @endforeach
             
               
           
           
            </tbody>
        </table>

</body>
</html>