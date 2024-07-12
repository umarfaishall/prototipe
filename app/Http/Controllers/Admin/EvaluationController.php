<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\Models\Activity;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\DetailActivity;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ActivityRegistration;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    public function index($id)
    {
        // $relawans = User::where('role', 'user')->paginate(10);
        $relawans = ActivityRegistration::where('activity_id', $id)->with('user')->paginate(10);

        return view('pages.admin.evaluasi.index', compact('relawans'));
    }

    public function korlapindex($id)
    {
        $activity = Activity::findOrFail($id);
        $details = DetailActivity::where('activity_id', $id)
                                    ->select('id', 'activity_id', 'activity_date', 'description')
                                    ->paginate(10);
        // $attendance = Attendance::where('activity_id', $id)->first();
        $descriptions = DetailActivity::where('activity_id', $id)
                                    ->pluck('description', 'activity_date')
                                    ->all();

        return view('pages.korlap.tugas.index', compact('activity', 'descriptions', 'details'));
    }

    public function edit($id)
    {
        $activityRegistration = ActivityRegistration::with('user')->findOrFail($id);

        return view('pages.admin.evaluasi.edit', compact('activityRegistration'));
    }

    public function korlapedit($id)
    {
        $activity = Activity::findOrFail($id);
        $details = DetailActivity::where('activity_id', $id)->get();

        return view('pages.korlap.tugas.edit', compact('activity', 'details'));
    }

    public function korlapupdate(Request $request, $id)
    {
        $details = DetailActivity::where('activity_id', $id)->get();
        $activity_dates = $request->input('activity_date');
        $description = $request->input('description');

        foreach ($activity_dates as $key => $activity_date) {
            $date = Carbon::parse($activity_date)->format('Y-m-d');
            DetailActivity::where('activity_id', $id)
                 ->where('activity_date', $date)
                 ->update(['description' => $description[$key]]);
        }

        Alert::toast('Detail Kegiatan berhasil ditambahkan', 'success');

        return redirect()->route('korlap.tugas.index', $id);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'evaluation' => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        ActivityRegistration::findOrFail($id)->update([
            'evaluation' => $request->evaluation,
        ]);

        // logic update evaluation
        Alert::toast('Evaluasi berhasil diubah', 'success');

        return redirect()->route('admin.aktivitas.evaluasi.index', $id);
    }
}
