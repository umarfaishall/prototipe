<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityRegistration;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VerificationController extends Controller
{
    public function index(Request $request)
    {
        $volunteer = ActivityRegistration::where('activity_id', $request->id)->get();
        return view('pages.admin.aktivitas.relawan', compact('volunteer'));
    }

    public function pimindex(Request $request)
    {
        $volunteer = ActivityRegistration::where('activity_id', $request->id)->get();
        return view('pages.pimpinan.aktivitas.relawan', compact('volunteer'));
    }

    public function changeStatus(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'id' => 'required|integer|exists:activity_registrations,id',
                'status' => 'required|string|in:pending,approved,rejected', // Sesuaikan dengan nilai yang valid untuk kolom status Anda
            ]);

            $volunteer = ActivityRegistration::findOrFail($request->id);

            $volunteer->status = $request->status;
            $volunteer->save();

            if ($request->status === 'approved') {
                $activity = $volunteer->activity;
                $startDate = Carbon::parse($activity->start_date);
                $endDate = Carbon::parse($activity->end_date);

                $dates = [];

                while ($startDate <= $endDate) {
                    $dates[] = $startDate->copy();
                    $startDate->addDay();
                }


                foreach ($dates as $date) {
                    Attendance::create([
                        'user_id' => $volunteer->user_id,
                        'activity_id' => $volunteer->activity_id,
                        'attendance_date' => $date,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Status berhasil diubah.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
