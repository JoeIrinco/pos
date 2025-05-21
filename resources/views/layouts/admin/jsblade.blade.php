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
<script src="public/css2/vendor/jquery/jquery.min.js"></script>
<script src="public/css2/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="public/css2/vendor/popper.min.js"></script>
<script src="public/css2/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="public/css2/vendor/jquery-ui-touch/jquery.ui.touch-punch-improved.js"></script>
<script src="public/css2/vendor/lobicard/js/lobicard.js"></script>
<script class="include" type="text/javascript" src="public/css2/vendor/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/css2/vendor/jquery.scrollTo.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!--datatables-->
<script src="public/css2/vendor/data-tables/jquery.dataTables.min.js"></script>
<script src="public/css2/vendor/data-tables/dataTables.bootstrap4.min.js"></script>

<!--form basic wizard init-->
    <script src="public/css2/vendor/form-wizard-init.js"></script>

{{-- <script src="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> --}}


<!--init scripts-->
<script src="public/css2/js/scripts.js"></script>

<!--toaster-->
<script src="public/css2/vendor/toastr-master/toastr.js"></script>
<script src="public/css2/vendor/toastr-master/toastr-init.js"></script>

<!--select2-->
<script src="public/css2/vendor/select2/js/select2.min.js"></script>
<script src="public/css2/vendor/select2-init.js"></script>
{{-- data picker --}}
<script src="public/css2/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
<script src="public/css2/vendor/date-picker-init.js"></script>

<!--touchspin-->
<script src="{{asset("public/css2/vendor/touchspin/jquery.bootstrap-touchspin.min.js")}}"></script>
<script src="{{asset("public/css2/vendor/touchspin-init.js")}}"></script>

    