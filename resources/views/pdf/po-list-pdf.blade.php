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
    <h3>VALLERY ENTERPRISES STORE PO LIST</h3>    
<p>Date Print: {{$now}}</p>
<p>Total count: {{$po_list_count}}</p>
        <table width="100%" align="center" cellspacing="20">
            <thead>
            <tr>
                <th>PO Number</th>
                <th>Oder by</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Order Date</th>
            </tr>
            </thead>

            <tbody>
        
                @foreach ($po_lists as $po_list)
                <tr>
                    <td>{{$po_list->po_num}}</td>
                    <td>{{$po_list->user_name}}</td>
                    <td>{{$po_list->total_price}}</td>
                    <td>{{$po_list->status}}</td>
                    <td>{{$po_list->comment}}</td>
                    <td>{{$po_list->created_at}}</td>                                          
                 </tr>
                @endforeach
             
               
           
           
            </tbody>
        </table>

</body>
</html>