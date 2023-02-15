@extends('backend.app.app')

@section('content')
<div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="app-brand">
                        <a href="{{ route('admin.dashboard') }}" style="width:100%">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg"
                                preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name">Employee Attendance Manager</span>
                        </a>
                    </div>
                </div>
                <div class="card-body p-5">
                    <h4 class="text-dark mb-5">Sign Up</h4>
                    @error('first_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('full_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('password_confirmation')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <input type="text" class="form-control input-lg" id="name"
                                    aria-describedby="nameHelp" placeholder="First Name" name="first_name">
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="text" class="form-control input-lg" id="name"
                                    aria-describedby="nameHelp" placeholder="Full Name" name="full_name">
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="email" class="form-control input-lg" id="email"
                                    aria-describedby="emailHelp" placeholder="email" name="email">
                            </div>
                            <div class="form-group col-md-12 ">
                                <input type="password" class="form-control input-lg" id="password"
                                    placeholder="Password" name="password">
                            </div>
                            <div class="form-group col-md-12 ">
                                <input type="password" class="form-control input-lg" id="cpassword"
                                    placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <div class="col-md-12">
                                <div class="d-inline-block mr-3">
                                    <label class="control control-checkbox">
                                        <input type="checkbox" required />
                                        <div class="control-indicator"></div>
                                        I Agree the terms and conditions
                                    </label>

                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Create Employee</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection