<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Attendance;
use App\Models\User;
use App\Models\DetailActivity;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class ProfileController extends Controller
{
    use UploadFile;

    // public function index()
    // {
    //     $user_id = Auth::user()->id;
    //     $user = User::findOrFail($user_id);

    //     $user->load(['activity_registration' => function($query) {
    //         $query->with('activity');
    //         $query->select('id', 'user_id', 'activity_id', 'status');
    //     }]);

    //     $activityRegistration = $user->activity_registration;

    //     $statuses = $activityRegistration->pluck('status')->unique()->values();

    //     // how to load realtion
    //     // $user->load('activity_registration.activity');

    //     return view('pages.profile.index', compact('user', 'activityRegistration', 'statuses'));
    // }
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->load(['activity_registration' => function($query) {
            $query->with(['activity' => function($query) {
                $query->select('id', 'activity_name', 'start_date', 'end_date', 'domicile');
            }]);
            $query->select('id', 'user_id', 'activity_id', 'status');
        }]);

        $activityRegistration = $user->activity_registration;

        $statuses = $activityRegistration->pluck('status')->unique()->values();

        $activities = $activityRegistration->map(function($registration) {
            $activity = $registration->activity;
            return [
                'id' => $registration->id,
                'activity_name' => $activity->activity_name,
                'domicile' => $activity->domicile,
                'periode_kegiatan' => Carbon::parse($activity->start_date)->format('d F Y') . ' - ' . Carbon::parse($activity->end_date)->format('d F Y'),
                'status' => $registration->status,
            ];
        });

        return view('pages.profile.index', compact('user', 'activities', 'statuses', 'activityRegistration'));
    }

    public function show($id)
    {
        $activity = Activity::with(['detail_activity', 'attendance' => function ($query) {
            $query->where('user_id', Auth::user()->id);
        }])->findOrFail($id);

        $details = $activity->detail_activity;
        $attendance = $activity->attendance;

        $attendance_status = [];

        if ($attendance->isNotEmpty()) {
            foreach ($attendance as $attend) {
                $attendance_status[] = [
                    'date' => $attend->attendance_date,
                    'status' => $attend->is_attended ? 'Hadir' : 'Tidak Hadir',
                    'description' => $details->where('activity_date', $attend->attendance_date)->first()->description ?? '',
                ];
            }
        } else {
            $attendance_status = [];
        }

        return view('pages.profile.show', compact('activity', 'attendance_status', 'details'));
    }

    public function edit()
    {
        return view('pages.profile.edit');
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        //     'phone' => 'required|string|max:15',
        //     'address' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'domicile' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['profile_image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['profile_image'] = $this->uploadFile($image, 'profile');
        }

        $user->update($data);

        return redirect()->route('relawan.profil')->withSuccess('Profile berhasil diupdate');
    }
}
