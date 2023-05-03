{{-- {{ dd(Session::get('data')) }} --}}
@extends('layouts.app')
@section('content')
    <style>
        .header {
            background: grey !important;
            position: relative !important;
        }

        .header a {
            color: white !important;
        }

        #afb_main {
            margin-top: 50px
        }
    </style>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header bg-primary text-white font-weight-bold">{{ __('Verify Your Phone Number') }}</h4>
                    <div class="card-body text-center">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="font-weight-bold">Please enter the OTP sent to your number:
                            <b>{{ session('phone_number') }}</b>
                        </div>
                        <hr>
                        <form action="{{ route('verify-otp-submit') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="verification_code"
                                    class="col-md-4 col-form-label text-md-right">{{ __('OTP Code') }}</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="phone_number" value="{{ session('phone_number') }}">
                                    <input type="hidden" name="user_data" value="{{ session('user_data') }}">
                                    <input id="verification_code" type="tel"
                                        class="form-control @error('verification_code') is-invalid @enderror"
                                        name="verification_code" value="{{ old('verification_code') }}" required>
                                    @error('verification_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify Phone Number') }}
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
