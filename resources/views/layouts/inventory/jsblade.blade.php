<script src="{{asset('public/css3/js/jquery.magnific-popup.min.js')}}"></script>

@if(Route::current()->getName() == 'receive-po')
{{-- <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script src="{{asset('public/assets/js/checktable.js')}}"></script>
@endif

@if(Route::current()->getName() != 'receive-po')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endif
<!-- Placed js at the end of the page so the pages load faster -->
    <script src="{{asset('public/assets/vendor/popper.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('public/assets/vendor/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/assets/vendor/lobicard/js/lobicard.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery.scrollTo.min.js')}}"></script>
  
    <!--chartjs-->
    <script src="{{asset('public/assets/vendor/chartjs/Chart.min.js')}}"></script>

    <!--chartjs initialization-->
    <script>


    </script>


    <!--custom chart-->
    <script src="{{asset('public/assets/vendor/custom-chart/Chart.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/custom-chart/underscore-min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/custom-chart/moment.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/custom-chart/accounting.min.js')}}"></script>
    <!--custom chart init-->
    {{-- <script src="{{asset('public/assets/vendor/custom-chart/custom-chart-init.js')}}"></script> --}}


    <!--easy pie chart-->
    <script src="{{asset('public/assets/vendor/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery-easy-pie-chart/easy-pie-chart-init.js')}}"></script>

    <!--vectormap-->
    {{-- <script src="{{asset('public/assets/vendor/vector-map/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/vector-map/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('public/assets/vendor/vmap-init.js')}}"></script> --}}



       <!--date picker-->
       <script src="{{asset('public/assets/vendor/date-picker/js/bootstrap-datepicker.min.js')}}"></script>
       <script src="{{asset('public/assets/vendor/date-picker-init.js')}}"></script>

       

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--init scripts-->
    <script src="{{asset('public/assets/js/scripts.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>

    <!--select2-->
    <script src="{{asset('/public/css2/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('/public/css2/vendor/select2-init.js')}}"></script>

  