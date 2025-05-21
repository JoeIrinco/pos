@if(Route::current()->getName() == 'receive-po2')

@else
   
<style>

  table.dataTable.dt-checkboxes-select tbody tr,
  table.dataTable thead th.dt-checkboxes-select-all,
  table.dataTable tbody td.dt-checkboxes-cell {
  cursor: pointer;
  }
  
  table.dataTable thead th.dt-checkboxes-select-all,
  table.dataTable tbody td.dt-checkboxes-cell {
  text-align: center;
  }
  
  div.dataTables_wrapper span.select-info,
  div.dataTables_wrapper span.select-item {
  margin-left: 0.5em;
  }
  
  @media screen and (max-width: 640px) {
  div.dataTables_wrapper span.select-info,
  div.dataTables_wrapper span.select-item {
    margin-left: 0;
    display: block;
  }
  }
      </style>
 <!--favicon icon-->
 <link rel="icon" type="image/png" href="{{asset('public/assets/img/favicon.html')}}">

 <title>Vallery Invetory</title>

 <!--google font-->
 <link href="{{asset('public/assets/css/font.css')}}" rel="stylesheet">
 <link href="{{asset('public/css4/css/magnific-popup.css')}}" rel="stylesheet">
 <link href="{{asset('public/css3/css/style.css')}}" rel="stylesheet">

 <!--common style-->
 <link href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{asset('public/assets/vendor/lobicard/css/lobicard.css')}}" rel="stylesheet">
 <link href="{{asset('public/assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
 <link href="{{asset('public/assets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
 <link href="{{asset('public/assets/vendor/themify-icons/css/themify-icons.css')}}" rel="stylesheet">
 <link href="{{asset('public/assets/vendor/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet">
     
 <!--easy pie chart-->
 <link href="{{asset('public/assets/vendor/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet">

 <!--custom css-->
 <link href="{{asset('public/assets/css/main.css')}}" rel="stylesheet">



  <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/data-tables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  
<!--toastr-->
<link href="{{asset('public/css2/vendor/toastr-master/toastr.css')}}" rel="stylesheet">
  

@if(Route::current()->getName() != 'product-management')

@endif

@if(Route::current()->getName() == 'receive-po' || Route::current()->getName() == 'purchaseOrder' ||Route::current()->getName() == 'product-management' ||Route::current()->getName() == 'return-view-page' )
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
@else
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@endif


<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <!--date picker style-->
    <link href="{{asset('public/assets/vendor/date-picker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" /> 


    
  <!--custom select 2-->
    <link href="{{asset('public/css2/vendor/select2/css/select2.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   

@endif