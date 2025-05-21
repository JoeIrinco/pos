<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Of Pending Order</title>

</head>

<body>
    <h3 align="center">VALLERY ENTERPRISES STORE</h3>
    <h3 align="center">List Of Pending Order</h3>

       
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
    
    <div>
    @if (count($store_purchase_items)>0)
        <table  align="center" cellspacing="15">
            <thead>
            <tr>
                <th>Order</th>
                <th>Remaining Order</th>
                <th>UNIT</th>
                <th style="text-align: left">Decription</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
            </thead>

            <tbody>
        
                @foreach ($store_purchase_items as $store_purchase_item)
                <tr style="text-align: center">
                    <td>{{$store_purchase_item->quantity}}</td>
                    <td>{{$store_purchase_item->Remaining_Order}}</td>
                    <td>{{$store_purchase_item->unit}}</td>
                    <td style="text-align: left">{{$store_purchase_item->product_name}}</td>
                    <td>{{number_format($store_purchase_item->amount,2)}}</td>
                    <td>{{number_format($store_purchase_item->total,2)}}</td>
                 
                 </tr>
                @endforeach
                <tr>
                    <td colspan="5" style="text-align:center;">
                        '---nothing follows---'
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right;">
                       <h5> Total Amount Due {{number_format($totalPricesData,2)}}</h5>
                    </td>
                    
                </tr>
               
           
           
            </tbody>
        </table>
          @else
            
        <h1 align ="center">All Item Was Received</h1>
        @endif
    </div>
</body>
</html>