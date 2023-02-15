@extends('backend.app.app')

@section('content')
    <div class="container mt-5 mx-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>User Password</h2>
                    </div>
                    @error('current_password')
                    <div class="alert alert-danger mx-3 mt-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('new_password')
                    <div class="alert alert-danger mx-3 mt-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('confirm_password')
                    <div class="alert alert-danger mx-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="card-body">
                        <form action="{{ route('update.password', $user->id) }}" method="Post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="Name">Current Password</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Current Password" name="current_password">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Name">New Password</label>
                                    <input type="text" class="form-control" id="Name" placeholder="New Password" name="new_password">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Email">Confirm Password</label>
                                    <input type="text" class="form-control" id="Email" placeholder="Confirm Password"  name="confirm_password">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection