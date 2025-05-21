<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Return List</title>
    <style>
        table, th, td {
            border: 1px solid black;
  border-collapse: collapse;
        }
        </style>
</head>

<body>
    <h3>VALLERY ENTERPRISES</h3>    
    <P><strong>Return Product:</strong> {{$ReturnData->productname}} {{$ReturnData->product_description}}</P> 
    <P><strong>Quantity Return:</strong> {{$ReturnData->quantity}} <br><strong>Quantity Recieve:</strong> {{$returnDatalist->receivePRoduct}}</P> 
    
        <table width="100%" align="center" cellspacing="10">
            <thead>
                <tr>      
                    <th style="font-size: 12px">Quantity</th>                                           
                    <th style="font-size: 12px">Invoice</th>                  
                    <th style="font-size: 12px">PO</th>                                                      
                    <th style="font-size: 12px">Product</th>                                                      
                    <th style="font-size: 12px">Lot</th>                                                
                    <th style="font-size: 12px">Expiration</th>
                    <th style="font-size: 12px">Recieve By</th>
                    <th style="font-size: 12px">Recieve Date</th>
                </tr>
            </thead>

            <tbody>
        
                @foreach ($replaceData as $Return)
                <tr>
                    <td style="font-size: 12px"><center>{{$Return->quantity}}</center></td>
                    <td style="font-size: 12px">{{$Return->invoice_num}}</td>
                    <td style="font-size: 12px">{{$Return->po_id}}</td>                                    
                    <td style="font-size: 12px">{{$Return->productname}} {{$Return->product_description}}</td>
                    <td style="font-size: 12px">{{$Return->lot_no}}</td>
                    <td style="font-size: 12px">{{$Return->expiration_date}}</td>                                          
                    <td style="font-size: 12px">{{$Return->name}}</td>                                          
                    <td style="font-size: 12px">{{$Return->created_at}}</td>                                          
                 </tr>
                @endforeach
             
               
           
           
            </tbody>
        </table>

</body>
</html>