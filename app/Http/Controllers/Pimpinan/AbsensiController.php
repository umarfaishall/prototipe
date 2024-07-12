<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index($id)
    {
        $attendance_date = Attendance::with('user')->where('activity_id', $id)->get();

        $users = User::select('users.id', 'users.name')
            ->join('activity_registrations', 'users.id', '=', 'activity_registrations.user_id')
            ->where('activity_registrations.activity_id', '=', $id)
            ->with(['attendance' => function ($query) use ($id) {
                $query->where('activity_id', $id);
            }])
            ->get();

            
        return view('pages.pimpinan.aktivitas.absensi', compact('users', 'attendance_date'));
    }

    public function absen(Request $request)
    {
        $absensi = Attendance::where('id', $request->id)
            ->first();

        $absensi->is_attended = $absensi->is_attended == 1 ? 0 : 1;

        $absensi->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Absensi berhasil diubah',
        ]);
    }
}
