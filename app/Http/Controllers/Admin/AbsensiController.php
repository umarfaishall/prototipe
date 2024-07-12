<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Activity;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    public function index($id)
    {
        $attendance_date = Attendance::select('attendance_date')
            ->where('activity_id', $id)
            ->distinct()
            ->get()
            ->pluck('attendance_date');

        $users = User::select('users.id', 'users.name')
            ->join('activity_registrations', 'users.id', '=', 'activity_registrations.user_id')
            ->where('activity_registrations.activity_id', '=', $id)
            ->where('activity_registrations.status', '<>', 'rejected')
            ->with(['attendance' => function ($query) use ($id) {
                $query->where('activity_id', $id);
            }])
            ->get();

        return view('pages.admin.aktivitas.absensi', compact('users', 'attendance_date'));
    }
    
    public function korlapindex($id)
    {
        $attendance_date = Attendance::select('attendance_date')
            ->where('activity_id', $id)
            ->distinct()
            ->get()
            ->pluck('attendance_date');

        $users = User::select('users.id', 'users.name')
            ->join('activity_registrations', 'users.id', '=', 'activity_registrations.user_id')
            ->where('activity_registrations.activity_id', '=', $id)
            ->where('activity_registrations.status', '<>', 'rejected')
            ->with(['attendance' => function ($query) use ($id) {
                $query->where('activity_id', $id);
            }])
            ->get();

        return view('pages.korlap.aktivitas.absensi', compact('users', 'attendance_date'));
    }

    public function pimindex($id)
    {
        $attendance_date = Attendance::select('attendance_date')
            ->where('activity_id', $id)
            ->distinct()
            ->get()
            ->pluck('attendance_date');

        $users = User::select('users.id', 'users.name')
            ->join('activity_registrations', 'users.id', '=', 'activity_registrations.user_id')
            ->where('activity_registrations.activity_id', '=', $id)
            ->where('activity_registrations.status', '<>', 'rejected')
            ->with(['attendance' => function ($query) use ($id) {
                $query->where('activity_id', $id);
            }])
            ->get();

            
        return view('pages.pimpinan.aktivitas.absensi', compact('users', 'attendance_date'));
    }

    // public function absen(Request $request)
    // {
    //     $absensi = Attendance::where('id', $request->id)
    //         ->first();

    //     $absensi->is_attended = $absensi->is_attended == 1 ? 0 : 1;

    //     $absensi->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Absensi berhasil diubah',
    //     ]);
    // }

    public function absen(Request $request)
    {
        $attendances = $request->input('attendance');

        foreach ($attendances as $attendance_id => $is_attended) {
            $attendance = Attendance::find($attendance_id);

            if ($is_attended == 1) {
                $attendance->is_attended = 1;
                $attendance->save();
            } else {
                $attendance->is_attended = null;
                $attendance->save();
            }
        }

        $user_id = $request->input('user_id');
        $activity_id = $request->input('activity_id');
        Attendance::where('user_id', $user_id)
            ->where('activity_id', $activity_id)
            ->whereNotIn('id', array_keys($attendances))
            ->update(['is_attended' => null]);
            
        Alert::toast('Absensi berhasil diubah', 'success');
        return redirect()->back();
    }

    public function indexPdf($id)
    {
        $attendance_date = Attendance::select('attendance_date')
            ->where('activity_id', $id)
            ->distinct()
            ->get()
            ->pluck('attendance_date');

        $users = User::select('users.id', 'users.name')
            ->join('activity_registrations', 'users.id', '=', 'activity_registrations.user_id')
            ->where('activity_registrations.activity_id', '=', $id)
            ->where('activity_registrations.status', '<>', 'rejected')
            ->with(['attendance' => function ($query) use ($id) {
                $query->where('activity_id', $id);
            }])
            ->get();
        
        $pdf = Pdf::loadView('pages.admin.aktivitas.absensipdf', compact('users', 'attendance_date'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Absensi ' . $id . '.pdf');
    }
}
