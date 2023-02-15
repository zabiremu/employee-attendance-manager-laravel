@extends('backend.app.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="container mt-5 ms-3 mx-auto">
        <div class="row mx-auto">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Create Employee Details</h2>
                    </div>
                    @error('emergency_phone_number')
                        <div class="alert alert-danger mx-3 mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('phone_number')
                        <div class="alert alert-danger mx-3 mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('email')
                        <div class="alert alert-danger mx-3 mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('emplpoyee')
                        <div class="alert alert-danger mx-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="card-body">
                        <form action="{{ route('store-employee-contact') }}" method="Post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Employee">Employee Name</label>
                                        <select class="form-control" id="Employee" name="emplpoyee">
                                            <option disabled selected>Select Employee</option>
                                            @forelse ($employee as $key => $item)
                                                <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                            @empty
                                                <option>No Employee</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" placeholder="Phone Number" name="phone_number">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="Emergency">Emergency Phone Number</label>
                                    <input type="number" class="form-control" id="Emergency" placeholder="Emergency Phone Number" name="emergency_phone_number">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#photo').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0'])
                })
            })
        </script>
    @endpush
@endsection
