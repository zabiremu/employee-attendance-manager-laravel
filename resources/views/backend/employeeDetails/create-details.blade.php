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
                    @error('address')
                        <div class="alert alert-danger mx-3 mt-3" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('photo')
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
                        <form action="{{ route('store-employee-details') }}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Employee">Select Employee Name</label>
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
                                    <label for="Address">Address</label>
                                    <textarea type="text" class="form-control" id="Address" placeholder="Address" name="address"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="photo">Image</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <img id="show_image" src="{{ asset('uploads/R (2).png') }}" alt=""
                                        width="110" style="border-radius: 50%">

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
