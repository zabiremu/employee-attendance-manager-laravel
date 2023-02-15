@extends('backend.app.app')

@section('content')
{{-- {{ dd($employee->userDetail->address) }} --}}
    <div class="container" style="margin:3rem 0;">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Employee Deatils Updated</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">SR</th>
                                        <th class="wd-15p border-bottom-0">Full Name</th>
                                        <th class="wd-20p border-bottom-0">Email</th>
                                        <th class="wd-15p border-bottom-0">Phone Number </th>
                                        <th class="wd-15p border-bottom-0">Emergency Phone Number</th>
                                        <th class="wd-15p border-bottom-0">Status</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contactData as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->full_name  }}</td>
                                            <td>{{ $item->userContact != null ? $item->userContact->email : '' }}</td>
                                            <td>{{ $item->userContact != null ? $item->userContact->number : '' }}</td>
                                            <td>{{ $item->userContact != null ? $item->userContact->emergency_phone_number : '' }}</td>
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
                                                @if ($item->userContact != null )
                                                <a href="{{ route('employe-contact-edit', $item->id) }}" type="button"
                                                    class="mb-1 btn btn-sm btn-info">Edit</a>
                                                @else

                                                @endif
                                                @if ($item->userContact != null )
                                                <button type="button" class="mb-1 btn btn-sm btn-danger button">Delete</button>
                                                <form action="{{ route('employee.contact.delete', $item->userContact->id) }}" method="post">
                                                    @csrf
                                                </form>
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
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
    @endpush
@endsection
