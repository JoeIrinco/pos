<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Inventory Card</title>
    <style>
        #joe, th, td {
            border: 1px solid black;
            /* border-collapse: collapse; */
            font-size: 10px;
        }

  
        .row {
          margin-left:-5px;
          margin-right:-5px;
        }
          
        .column,  th, td {
          float: left;
          width: 50%;
          border-collapse: collapse;
          padding: 5px;
        }
        
        /* Clearfix (clear floats) */
        .row::after {
          content: "";
          clear: both;
          
          display: table;
        }

        td {
          word-wrap: break-word;
        }
</style>
</head>

<body>
  <div class="row">
    <div class="column">
      <table id="joe" style="border: 1px solid black;">
        <tr>
          <th colspan="5" style ="text-align: left;">ITEM NAME: {{$id1->productname}}</th>     
        </tr>
        <tr>
          <th colspan="5" style ="text-align: left">Size/REF: {{$id1->product_description}}</th>     
        </tr>
         <tr>
          <td colspan="2" style="width:30%"><strong>BRAND: {{$id1->brand}}</strong></td>
          <td  colspan="2" style="width:40%"><strong>SKU: {{$id1->product_code}}</strong></td>
          <td style="width:80%"></td>
        </tr>
           <tr>
          <td colspan="2" style="width:30%"><strong>LOCATION:</strong></td>
          <td style="width:70%"><strong>RACK:</strong></td>
          <td  colspan="2" style="width:70%"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td><strong>UNIT</strong></td>
          <td><strong>PACKAGING</strong></td>
          <td ><strong>LOT NUMBER</strong></td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>
       
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td colspan="2" >DATE:</td>
        </tr>
        
      
      </table> 
    </div>

    <div class="column">
      <table id="manuel"  style="border: 1px solid black;">
        <tr>
          <th colspan="5" style ="text-align: left;">ITEM NAME: {{$id2->productname}}</th>     
        </tr>
        <tr>
          <th colspan="5" style ="text-align: left">Size/REF: {{$id2->product_description}}</th>     
        </tr>
         <tr>
          <td colspan="2" style="width:30%"><strong>BRAND: {{$id2->brand}}</strong></td>
          <td  colspan="2" style="width:40%"><strong>SKU: {{$id2->product_code}}</strong></td>
          <td style="width:80%"></td>
        </tr>
           <tr>
          <td colspan="2" style="width:30%"><strong>LOCATION:</strong></td>
          <td style="width:70%"><strong>RACK:</strong></td>
          <td  colspan="2" style="width:70%"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td><strong>UNIT</strong></td>
          <td><strong>PACKAGING</strong></td>
          <td ><strong>LOT NUMBER</strong></td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>

        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td colspan="2" >DATE:</td>
        </tr>
        
      
      </table> 
    </div>
  </div> 

  <div class="row">
    <div class="column">
      <table id="joe" style="border: 1px solid black;">
        <tr>
          <th colspan="5" style ="text-align: left;">ITEM NAME: {{$id3->productname}}</th>     
        </tr>
        <tr>
          <th colspan="5" style ="text-align: left">Size/REF: {{$id3->product_description}}</th>     
        </tr>
         <tr>
          <td colspan="2" style="width:30%"><strong>BRAND: {{$id3->brand}}</strong></td>
          <td  colspan="2" style="width:40%"><strong>SKU: {{$id3->product_code}}</strong></td>
          <td style="width:80%"></td>
        </tr>
           <tr>
          <td colspan="2" style="width:30%"><strong>LOCATION:</strong></td>
          <td style="width:70%"><strong>RACK:</strong></td>
          <td  colspan="2" style="width:70%"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td><strong>UNIT</strong></td>
          <td><strong>PACKAGING</strong></td>
          <td ><strong>LOT NUMBER</strong></td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>
       
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td colspan="2" >DATE:</td>
        </tr>
        
      
      </table> 
    </div>

    <div class="column">
      <table id="manuel"  style="border: 1px solid black;">
        <tr>
          <th colspan="5" style ="text-align: left;">ITEM NAME: {{$id4->productname}}</th>     
        </tr>
        <tr>
          <th colspan="5" style ="text-align: left">Size/REF: {{$id4->product_description}}</th>     
        </tr>
         <tr>
          <td colspan="2" style="width:30%"><strong>BRAND: {{$id4->brand}}</strong></td>
          <td  colspan="2" style="width:40%"><strong>SKU: {{$id4->product_code}}</strong></td>
          <td style="width:80%"></td>
        </tr>
           <tr>
          <td colspan="2" style="width:30%"><strong>LOCATION:</strong></td>
          <td style="width:70%"><strong>RACK:</strong></td>
          <td  colspan="2" style="width:70%"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td><strong>UNIT</strong></td>
          <td><strong>PACKAGING</strong></td>
          <td ><strong>LOT NUMBER</strong></td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>

        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td></td>
          <td></td>
          <td></td>
           <td></td>
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td colspan="2" >DATE:</td>
        </tr>
        
      
      </table> 
    </div>
  </div>

</body>
</html>