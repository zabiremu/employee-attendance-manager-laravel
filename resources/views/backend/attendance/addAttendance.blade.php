@extends('backend.app.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Recent Order Table -->
                <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                        <h2>Attendence</h2>
                        <div class="">
                            <span>{{ Carbon\Carbon::now()->format('D-m-Y') }}</span>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th class="d-none d-md-table-cell">In Time</th>
                                    <th class="d-none d-md-table-cell">Out Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $employee->full_name }}
                                    </td>

                                    <input type="hidden" value="{{ $employee->id }}" class="id">
                                    <input type="hidden" value="{{ isset($user->id) ? $user->id : '' }}" class="userid">
                                    <td>
                                        <button class="mb-1 btn btn-sm btn-primary" id="in_time">In Time</button>
                                    </td>
                                    <td>
                                        <button type="button" class="mb-1 btn btn-sm btn-info" id="out_time">Out
                                            Time</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            let id = $('.id').val();
            console.log(id);
            $('#in_time').mousedown(function(e) {
                clearTimeout(this.downTimer);
                this.downTimer = setTimeout(function() {

                    $('#in_time').removeClass('btn-primary')
                    $('#in_time').addClass('btn-success')
                    // ajax request
                    $.ajax({
                        url: `{{ route('store.attendance') }}`,
                        method: 'get',
                        data: {
                            id: id,
                        },
                        success: function(res) {
                            console.log(res)
                        },
                    })
                    $('#in_time').html('Present')

                }, 1000);
            }).mouseup(function(e) {
                clearTimeout(this.downTimer);
            });
        </script>
        <script>
            let userid = $('.userid').val();

            $('#out_time').mousedown(function(e) {
                clearTimeout(this.downTimer);
                this.downTimer = setTimeout(function() {

                    $('#out_time').removeClass('btn-primary')
                    $('#out_time').addClass('btn-success')
                    // ajax request
                    $.ajax({
                        url: `{{ route('store.outTime.attendance') }}`,
                        method: 'get',
                        data: {
                            id: userid,
                        },
                        success: function(res) {
                            console.log(res)
                        },
                    })
                    $('#out_time').html('Out')

                }, 1000);
            }).mouseup(function(e) {
                clearTimeout(this.downTimer);
            });
        </script>
    @endpush
@endsection
