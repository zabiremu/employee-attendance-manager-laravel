<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function addAttendance()
    {
        $id = Auth::user()->id;
        $employee = User::find($id);
        $user = Attendance::where('user_id', $id)->first();
        return view('backend.attendance.addAttendance', compact('employee', 'user'));
    }

    public function storeAttendance(Request $request)
    {
        $id = $request->id;
        $data = new Attendance();
        $data->user_id = $id;
        $data->in_time = Carbon::now()->format('Y-m-d H:i:s');
        $data->save();
        return response()->json([
            'success' => 'successfully data updated',
        ]);
    }

    public function storeOutTimeAttendance(Request $request)
    {
        $id = $request->id;
        $data = Attendance::find($id);
        $data->out_time = Carbon::now()->format('Y-m-d H:i:s');
        $data->save();
        return response()->json('success');
    }

    public function attendanceLists()
    {
        $attandence = User::with('attendance')
            ->role('Employee')
            ->latest()
            ->get();
        return view('backend.attendance.attendanceLists', compact('attandence'));
    }
    public function attendLists()
    {
        $attandence = User::with('attendance')
            ->role('Employee')
            ->latest()
            ->get();
        return view('backend.attendance.report', compact('attandence'));
    }
}
