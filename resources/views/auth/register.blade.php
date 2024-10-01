@extends('layouts.frontend.master')
@section('content')
<div class="container-fluid login-register-image">
    <div class="row justify-content-center" style="padding-top: 180px; padding-bottom: 105px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white"><strong>{{ __('Register') }}</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div>
                            <div class="col-md-6"> 
                                <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="contact" class="col-md-12 col-form-label">{{ __('Contact') }}</label>
                                <div class="col-md-12">
                                    <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact"> 
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="col-md-12 col-form-label">{{ __('Address') }}</label>
                                <div class="col-md-12">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"> 
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-md-6">  
                                <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row px-4 text-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="validatorBtn">
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