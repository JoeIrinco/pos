<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PO Details</title>

</head>

<body style="font-family: 'Courier New', Courier, monospace; font-size: 10">
    <h3>VALLERY ENTERPRISES STORE</h3>

       
    <h3 style="margin:0;display:inline;float:left">P.O# {{$store_purchase_orders->po_num}}</h3>
    <h5 style="margin:0;display:inline;float:right">Order Date: {{ date('d-m-Y', strtotime($store_purchase_orders->created_at)) }}</h5>
     

    <p style="text-align: left; width:20%; display: inline-block;">Status {{$store_purchase_orders->status}}</p>

    <p >Supplier Name: {{$store_purchase_orders->name}}</p>
    <p >Supplier Address: {{$store_purchase_orders->address}}</p>
   {{--  <p style="text-align: right; width:80%;  display: inline-block;">RIGHT</p> --}}

    <br>
    <br>
    <br>
    <br>
    

   
        <table align="center" cellspacing="15" style="width:100%">
            <thead>
            <tr>
                <th align="left">QTY</th>
                <th align="left">UNIT</th>
                <th align="left">Product name</th>
                <th align="left">Description</th>
                <th align="left">brand</th>
                <th align="left">Price</th>
                <th align="left">Total Price</th>
            </tr>
            </thead>

            <tbody>
             
                @foreach ($store_purchase_items as $store_purchase_item)
           
                <tr>
                    <td>{{$store_purchase_item->quantity}}</td>
                    <td>{{$store_purchase_item->unit}}</td>
                    <td>{{$store_purchase_item->product_name}}</td>
                    <td>{{$store_purchase_item->product_description}}</td>
                    <td>{{$store_purchase_item->brand}}</td>

                    <td>{{$store_purchase_item->amount}}</td>
                    <td>{{$store_purchase_item->total}}</td>
                 
                 </tr>
                </font>
                @endforeach
                <tr>
                    <td colspan="5" style="text-align:center;">
                        '---nothing follows---'
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right;">
                       <h5> Total Amount Due {{$store_purchase_orders->total_price}}</h5>
                    </td>
                    
                </tr>
               
           
               
            </tbody>
        </table>
     
    
</body>
</html>