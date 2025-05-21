@extends('layouts.admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                            <label for="is_admin" class="col-md-2 col-form-label text-md-right">{{ __('Credential') }}</label>
                            <div class="col-md-4">
                                <select id="is_admin" class="form-control" name="is_admin" required >
                                    <option value=""> -- Select One --</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                    <option value="2">Inventory</option>
                                </select>
                            </div>

                            <label for="areacode" class="col-md-2 col-form-label text-md-right">{{ __('Area Code') }}</label>
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
                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        console.log("run");
    });
</script>




