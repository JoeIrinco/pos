{{-- <style>
            .page-break {
                page-break-after: always;
            }
            </style>

<table>

    <thead>
        <tr>
            <th >P.O NO.</th>
            <th>Product Name</th>
            <th>Unit</th>
        </tr>
    </thead>
    <tbody>
      
        @foreach($items as $item)
            <tr>
                <td>{{ $item->orders_id}}</td>
                <td>{{ $item->product_name}}</td>
                <td>{{ $item->quantity}}</td>
               
                    
                </tr>
            @endforeach		

            

    </tbody>
</table>
          


            <h1>Page 1 </h1>
            <div class="page-break"></div>
            <h1>{{ $item->customer_name }} {{ $item->customer_address }} {{ $item->customer_contact_number}}</h1> --}}

            {{-- @foreach($items as $item)
            <tr>
                <td>{{ $item->orders_id}}</td>
                <td>{{ $item->product_name}}</td>
                <td>{{ $item->quantity}}</td>
               
                    
                </tr>
            @endforeach --}}

            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <title>Purchase Order</title>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf+8"/>
            
                    <style type="text/css" media="screen">
                        html {
                            font-family: sans-serif;
                            line-height: 1.15;
                            margin: 0;
                        }
                        body {
                            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                            font-weight: 400;
                            line-height: 1.5;
                            color: #212529;
                            text-align: left;
                            background-color: #fff;
                            font-size: 10px;
                            margin: 36pt;
                        }
                        h4 {
                            margin-top: 0;
                            margin-bottom: 0.5rem;
                        }
                        p {
                            margin-top: 0;
                            margin-bottom: 1rem;
                        }
                        strong {
                            font-weight: bolder;
                        }
                        img {
                            vertical-align: middle;
                            border-style: none;
                        }
                        table {
                            border-collapse: collapse;
                        }
                        th {
                            text-align: inherit;
                        }
                        h4, .h4 {
                            margin-bottom: 0.5rem;
                            font-weight: 500;
                            line-height: 1.2;
                        }
                        h4, .h4 {
                            font-size: 1.5rem;
                        }
                        .table {
                            width: 100%;
                            margin-bottom: 1rem;
                            color: #212529;
                        }
                        .table th,
                        .table td {
                            padding: 0.75rem;
                            vertical-align: top;
                            border-top: 1px solid #dee2e6;
                        }
                        .table thead th {
                            vertical-align: bottom;
                            border-bottom: 2px solid #dee2e6;
                        }
                        .table tbody + tbody {
                            border-top: 2px solid #dee2e6;
                        }
                        .mt-5 {
                            margin-top: 3rem !important;
                        }
                        .pr-0,
                        .px-0 {
                            padding-right: 0 !important;
                        }
                        .pl-0,
                        .px-0 {
                            padding-left: 0 !important;
                        }
                        .text-right {
                            text-align: right !important;
                        }
                        .text-center {
                            text-align: center !important;
                        }
                        .text-uppercase {
                            text-transform: uppercase !important;
                        }
                        * {
                            font-family: "DejaVu Sans";
                        }
                        body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                            line-height: 1.1;
                        }
                        .party-header {
                            font-size: 1.5rem;
                            font-weight: 400;
                        }
                        .total-amount {
                            font-size: 12px;
                            font-weight: 700;
                        }
                        .border-0 {
                            border: none !important;
                        }
                        .center {
                            display: block;
                            margin-left: 0%;
                            margin-right: 10%;
                            width: 80%;
                        }
                        .account_name {
                            
                            margin-left: 0%;
                            margin-right: 10%;
                            margin-bottom: 0.5rem;
                            margin-top: .4cm;
                            font-weight: 500;
                            line-height: 1.2;
                            font-size: 1.5rem;
                        }
                        .account_name_ {
                            
                            
                            margin-top: .4cm;
                            
                        }
                        .space
                        {
                            word-spacing: -.2em;
                        }
                        
                        .p2
                        {
                        margin: 0 auto;
                        max-width: 900px;
                        /* border: solid 2px #ccc; */
                        padding: 12px;
                        overflow-wrap: break-word;
                        word-wrap: break-word;
                        hyphens: auto;
                        }
                    </style>
                </head>
            
                <body>
                    

                    {{-- Header --}}

                    {{-- Later on --}}
                    <div class="center">
                        <img src="{{ asset('public/image/head-vallery-logo.png') }}" alt="logo" height="100">
                    </div>
                    
                    
                    <p class="account_name_">ACCOUNT NAME:<p class="account_name text-uppercase">{{ $orders->customer_name }}</p></p>
                    <p class="space text-uppercase">ADDRESS:         {{ $orders->customer_address }}</p>
                    <p class="text-uppercase">CONTACT PERSON:  {{ $orders->customer_contact_person}}</p>
                    <p class="text-uppercase">CONTACT NO.:     {{ $orders->customer_contact_number }}</p>

                    <p>
                        <strong class="account_name"><h1>Purchase Order</h1></strong>
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-left border-0"><p>DATE:  {{ $orders->created_at }}</p></th>
                                <th scope="col" class="text-center border-0"><p>P.O. No.: {{ $getpurchasenumber->orders_id }}</p></th>
                            </tr>
                        </thead>
                       
                    </table>


                    
                    {{-- Table --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center border-0">QTY</th>
                                <th scope="col" class="text-center border-0">UNIT</th>
                                <th scope="col" class="text-center border-0">PRODUCT DESCRIPTION</th>
                                <th scope="col" class="text-center border-0">PRICE</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Items --}}
                            @foreach($items as $item)
                            <tr>
                                <td class="text-center pl-0">{{ $item->quantity }}</td>
                                
                                <td class="text-center">{{ $item->unit }}</td>

                                <td class="pl-0">{{ $item->product_name }}</td>
                                
                                <td class="text-center">{{ $item->amount }}</td>
                                
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    <div>
                        <p>REMARKS:</p>
                    </div>
                    <p class="p2">{{ $orders->remarks }}</p>
                    <script type="text/php">
                        if (isset($pdf) && $PAGE_COUNT > 1) {
                            $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                            $size = 10;
                            $font = $fontMetrics->getFont("Verdana");
                            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                            $x = ($pdf->get_width() - $width);
                            $y = $pdf->get_height() - 35;
                            $pdf->page_text($x, $y, $text, $font, $size);
                        }
                    </script>
                </body>
            </html>
            
            