<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityRegistration;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityRegistrationController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'activity_id' => 'required|integer',
                'full_name' => 'required|string|max:255',
                'reason_1' => 'required|string',
                'reason_2' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string|max:15',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            $data = $request->all();
            $data['user_id'] = auth()->id();

            ActivityRegistration::create([
                'activity_id' => $data['activity_id'],
                'user_id' => $data['user_id'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'reason_1' => $data['reason_1'],
                'reason_2' => $data['reason_2'],
                'status' => 'pending',
            ]);

            Alert::toast('Pendaftaran berhasil', 'success');

            DB::commit();
            return redirect()->back()->withSuccess('Pendaftaran berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();

            Alert::error('Error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy(ActivityRegistration $activityRegistration)
    {
        $activityRegistration->delete();

        return response()->json(['success' => true, 'message' => 'Status berhasil diubah.']);
    }
}
