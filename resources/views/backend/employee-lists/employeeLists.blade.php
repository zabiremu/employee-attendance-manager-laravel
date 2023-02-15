@extends('backend.app.app')

@section('content')
    <div class="container" style="margin:3rem 0;">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Employee Lists</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div style="margin-bottom: 20px; display:block;">
                                <input type="text" class="form-control search" placeholder="Search">
                            </div>
                            <div id="employeeTable">
                                <table class="table table-bordered text-nowrap border-bottom responsive">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">SR</th>
                                            <th class="wd-15p border-bottom-0">First Name</th>
                                            <th class="wd-15p border-bottom-0">Full Name</th>
                                            <th class="wd-20p border-bottom-0">Email</th>
                                            <th class="wd-15p border-bottom-0">Status</th>
                                            <th class="wd-25p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="allData">
                                        @forelse ($employee as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->first_name }}</td>
                                                <td>{{ $item->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <button type="button"
                                                            class="mb-1 btn btn-sm btn-primary">Active</button>
                                                    @else
                                                        <button type="button"
                                                            class="mb-1 btn btn-sm btn-danger">InActive</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('employee.status', $item->id) }}" type="button"
                                                        class="mb-1 btn btn-sm btn-warning">Status</a>
                                                    <a href="{{ route('employee.edit', $item->id) }}" type="button"
                                                        class="mb-1 btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('employee.delete', $item->id) }}" type="button"
                                                            class="mb-1 btn btn-sm btn-danger">Delete</a>    
                                                    {{-- <button type="button"
                                                        class="mb-1 btn btn-sm btn-danger button">Delete</button>
                                                    <form action="{{ route('employee.delete', $item->id) }}" method="post">
                                                        @csrf
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered responsive" id="content">
                                    <tbody class="searchData">

                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            var button = $('.button');
            button.on('click', function() {
                var form = $(this).next('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        form.submit()
                    }
                })
            })
        </script>
        <script>
            var search = $('.search')
            // var content = $('#content');
            search.on('keyup', function() {
                var value = $(this).val();
                if (value) {
                    $('.allData').hide()
                    $('.searchData').show()
                } else {
                    $('.allData').show()
                    $('.searchData').hide()
                }
                setTimeout(() => {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        url: `{{ route('search.employee') }}`,
                        method: 'get',
                        data: {
                            searchValue: value,
                        },
                        success: function(res) {
                            console.log(res)
                            $('#content').html(res)
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    })
                }, 500);
            })
        </script>
    @endpush
@endsection
