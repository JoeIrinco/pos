<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Inventory Card</title>
    <style>
      @page { margin: 20px; }
      body { margin: 20px; }
        #joe, th, td {
            border: 1px solid black;
            /* border-collapse: collapse; */
            font-size: 9px;
        }

       .row {
          margin-left:-5px;
          margin-right:-5px;
        }
        /* table.fixed { table-layout:fixed; } */
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
      <table id="joe" style="border: 1px solid black; width=350px"  >
        <tr>
          <td colspan="4" style ="text-align: left;width:250px" ><strong>ITEM NAME:</strong> {{ $id1->productname}}</td>     
        </tr>
        <tr>
          <td colspan="4" style ="text-align: left"><strong>Size/REF:</strong> {{ $id1->product_description}}</td>     
        </tr>
        <tr>
          <td colspan="4" ><strong>BRAND: </strong>{{ $id1->brand}}</td>                   
        </tr>
        <tr>          
          <td  colspan="4" ><strong>SKU: </strong>{{ $id1->product_code}}</td>         
        </tr>
           <tr>
            <td colspan="2" style="width:33px"><strong>LOCATION:</strong></td>
                  <td style="width:110px"><strong>RACK:</strong></td>
          <td   style="width:70px"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td  ><strong>UNIT</strong></td>
          
          <td ><strong>LOT NUMBER</strong> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>
       
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
        
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
         
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
       
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id1->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td >DATE:</td>
        </tr>
        
      
      </table> 
    </div>

    <div class="column">
      <table id="joe" style="border: 1px solid black;" >
        <tr>
          <td colspan="4" style ="text-align: left;width:250px" ><strong>ITEM NAME:</strong> {{ $id2->productname}}</td>     
        </tr>
        <tr>
          <td colspan="4" style ="text-align: left"><strong>Size/REF:</strong> {{ $id2->product_description}}</td>     
        </tr>
        <tr>
          <td colspan="4" ><strong>BRAND: </strong>{{ $id2->brand}}</td>                   
        </tr>
        <tr>          
          <td  colspan="4" ><strong>SKU: </strong>{{ $id2->product_code}}</td>         
        </tr>
           <tr>
          <td colspan="2" style="width:33px"><strong>LOCATION:</strong></td>
                  <td style="width:110px"><strong>RACK:</strong></td>
          <td   style="width:70px"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td  ><strong>UNIT</strong></td>
          
          <td ><strong>LOT NUMBER</strong> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>

        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
        
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
         
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
       
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id2->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td >DATE:</td>
        </tr>
        
      
      </table> 
    </div>

    
    

    

  </div>
  <div class="row">

    
    
    <div class="column">
      <table id="joe" style="border: 1px solid black;" >
        <tr>
          <td colspan="4" style ="text-align: left;width:250px" ><strong>ITEM NAME:</strong> {{ $id3->productname}}</td>     
        </tr>
        <tr>
          <td colspan="4" style ="text-align: left"><strong>Size/REF:</strong> {{ $id3->product_description}}</td>     
        </tr>
        <tr>
          <td colspan="4" ><strong>BRAND: </strong>{{ $id3->brand}}</td>                   
        </tr>
        <tr>          
          <td  colspan="4" ><strong>SKU: </strong>{{ $id3->product_code}}</td>         
        </tr>
           <tr>
          <td colspan="2" style="width:33px"><strong>LOCATION:</strong></td>
                  <td style="width:110px"><strong>RACK:</strong></td>
          <td   style="width:70px"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td  ><strong>UNIT</strong></td>
          
          <td ><strong>LOT NUMBER</strong> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>
       
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
        
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
         
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
       
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id3->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td >DATE:</td>
        </tr>
        
      
      </table> 
    </div>

    
    <div class="column">
      <table id="joe" style="border: 1px solid black;" >
        <tr>
          <td colspan="4" style ="text-align: left;width:250px" ><strong>ITEM NAME:</strong> {{ $id4->productname}}</td>     
        </tr>
        <tr>
          <td colspan="4" style ="text-align: left"><strong>Size/REF:</strong> {{ $id4->product_description}}</td>     
        </tr>
        <tr>
          <td colspan="4" ><strong>BRAND: </strong>{{ $id4->brand}}</td>                   
        </tr>
        <tr>          
          <td  colspan="4" ><strong>SKU: </strong>{{ $id4->product_code}}</td>         
        </tr>
           <tr>
          <td colspan="2" style="width:33px"><strong>LOCATION:</strong></td>
                  <td style="width:110px"><strong>RACK:</strong></td>
          <td   style="width:70px"><strong>SHELF:</strong></td>
        </tr>
         <tr>
          <td><strong>QTY</strong></td>
          <td  ><strong>UNIT</strong></td>
          
          <td ><strong>LOT NUMBER</strong> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td style="font-size: 7"><strong>EXPIRY DATE (mm/dd/yy)</strong></td>
        </tr>
       
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
        
        </tr> 
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
         
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
       
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        <tr>
          <td  style="height:16px"></td>
          <td>{{$id4->unit}}</td>
          <td></td>
          <td></td>
          
        </tr>
        
          <tr>
          <td colspan="3" >INVENTORY BY</td>
          <td >DATE:</td>
        </tr>
        
      
      </table> 
    </div>
  </div>

</body>
</html>