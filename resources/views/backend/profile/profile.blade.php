@extends('backend.app.app')

@section('content')
    <div class="container mt-5 ms-3 mx-auto">
        <div class="row mx-auto">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>User Information</h2>
                    </div>
                    @error('first_name')
                    <div class="alert alert-danger mx-3 mt-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('full_name')
                    <div class="alert alert-danger mx-3 mt-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('email')
                    <div class="alert alert-danger mx-3" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="card-body">
                        <form action="{{ route('admin.update',$user->id) }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="Name">First Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Name" value="{{ $user->first_name }}" name="first_name">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Name">Full Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Name" value="{{ $user->full_name }}" name="full_name">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" id="Email" placeholder="Email" value="{{ $user->email }}" name="email">
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