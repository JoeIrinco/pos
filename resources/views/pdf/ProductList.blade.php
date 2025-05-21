<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <style>
        table, th, td {
            border: 1px solid black;
  border-collapse: collapse;
        }
        </style>
</head>

<body>
    <h3>VALLERY ENTERPRISES STORE PRODUCT LIST</h3>    
<p>Date Print: {{$now}}</p>
<p>Total count: {{$store_product_lists_count}}</p>
        <table align="center" cellspacing="15">
            <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Decription</th>
                <th>Expiration</th>
                <th>Lot No</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>
        
                @foreach ($store_product_lists as $store_product_list)
                <tr>
                    <td>{{$store_product_list->product_code}}</td>
                    <td style="word-wrap: break-word">{{$store_product_list->productname}}</td>
                    <td style="word-wrap: break-word">{{$store_product_list->product_description}}</td>
                    @if ($store_product_list->exp_date==0)
                    <td>Yes</td>    
                    @else
                    <td>No</td>    
                    @endif
                    
                    @if ($store_product_list->no_lot_no==0)
                    <td>Yes</td>    
                    @else
                    <td>No</td>    
                    @endif
                    <td>{{$store_product_list->status}}</td>    
                    
                 </tr>
                @endforeach
             
               
           
           
            </tbody>
        </table>

</body>
</html>