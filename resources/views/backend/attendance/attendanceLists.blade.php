@extends('backend.app.app')

@section('content')
    <div class="container" style="margin:3rem 0;">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Employee Attend Lists</h3>
                        <h3 class="card-title">{{ Carbon\Carbon::now()->format('D-m-Y') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">SR</th>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">In Time</th>
                                        <th class="wd-15p border-bottom-0">Out Time</th>
                                        <th class="wd-15p border-bottom-0">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($attandence as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->first_name }}</td>
                                            <td>
                                                @if ($item->attendance)
                                                    {{ Carbon\Carbon::parse($item->attendance->created_at)->toTimeString() }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->attendance)
                                                    @if ($item->attendance->out_time == null)
                                                        Present
                                                    @else
                                                        {{ Carbon\Carbon::parse($item->attendance->updated_at)->toTimeString() }}
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->attendance)
                                                    {{ Carbon\Carbon::parse($item->attendance->created_at)->toFormattedDateString() }}
                                                @endif
                                            </td>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Atttendance</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
