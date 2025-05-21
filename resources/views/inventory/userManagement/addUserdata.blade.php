<div class="modal fade bd-example-modal-lg new-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="#" id="userForm" name="userForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_admin" class="col-md-2 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-4">
                                <select id="is_admin" class="form-control" name="is_admin" required >
                                    <option value=""> -- Select One --</option>
                                    <option value="0">Admin</option>
                                    <option value="1">User/pos</option>
                                    <option value="2">Inventory</option>
                                </select>
                            </div>

                           {{--  <label for="areacode" class="col-md-2 col-form-label text-md-right">{{ __('Area Code') }}</label>
                            <div class="col-md-4">
                                <select id="areacode" class="form-control" name="areacode" required >
                                    <option value=""> -- Select One --</option>
                                    <option value="TARLAC">TARLAC</option>
                                    <option value="NUEVA ECIJA">NUEVA ECIJA</option>
                                    <option value="BAGUIO/PANGASINAN">BAGUIO/PANGASINAN</option>
                                    <option value="ILOCOS">ILOCOS</option>
                                    <option value="REGION II">REGION II</option>
                                    <option value="BULACAN">BULACAN</option>
                                    <option value="PAMPANGA">PAMPANGA</option>
                                    <option value="IN HOUSE">IN HOUSE</option>
                                </select>
                                 --}}

                                 <label for="position" class="col-md-2 col-form-label text-md-right">{{ __('Position') }}</label>
                                 <div class="col-md-4">
                                     <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="name" autofocus>
     
                                     @error('position')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 
                            </div>

                            
                        </div>

                        <div class="form-group row">
                           
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                   
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    var form = document.getElementById('ProductForm');
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                }, false);
                            })();
                        </script>
                    
                </div>
            </div>
            <div class="modal-footer">
              {{--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('body').on('submit', '#userForm', function (event) {
                
                event.preventDefault();
                console.log('Product Add submitting...');
                $.ajax({
                    url: "{{ url('inventory/registration-member') }}",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.send-loading').show();
                    },
                    success: function (response) {
                        console.log('Product Add submitting success...');
                        $('.send-loading').hide();
                        swal({
                            title: 'Success!',
                            text: 'Successfully Added',
                            timer: 1500,
                            type: "success",
                        }, function () {
                            window.location.href = 'user-management';
                        });
    
                    },
                    error: function (error) {
                        console.log('Product Add submitting error...');
                        console.log(error);
                        console.log(error.responseJSON.message);
                        $('.send-loading').hide();
                        swal({
                            title: 'Error!',
                            text: "Error Msg: " + error.responseJSON.message + "",
                            //timer: 1500,
                            type: "error",
                        })
                    }
                });
            });
    });
</script>




