<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\DetailActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\UploadFile;
use Carbon\Carbon;

class ActivityController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::query()->latest()->paginate(10);

        foreach ($activities as $activity) {
            if ($activity->end_date < Carbon::now()) {
                $activity->status = 'Closed';
            } else {
                $activity->status = 'Open';
            }
        }

        return view('pages.admin.aktivitas.index', compact('activities'));
    }

    public function korlapindex()
    {
        $activities = Activity::query()->latest()->paginate(10);

        foreach ($activities as $activity) {
            if ($activity->end_date < Carbon::now()) {
                $activity->status = 'Closed';
            } else {
                $activity->status = 'Open';
            }
        }

        return view('pages.korlap.aktivitas.index', compact('activities'));
    }

    public function pimindex()
    {
        $activities = Activity::query()->latest()->paginate(10);

        foreach ($activities as $activity) {
            if ($activity->end_date < Carbon::now()) {
                $activity->status = 'Closed';
            } else {
                $activity->status = 'Open';
            }
        }
        
        return view('pages.pimpinan.aktivitas.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.aktivitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // if ($request->ajax()) {
                $validator = Validator::make($request->all(), [
                    'activity_name' => 'required|string|max:255',
                    'pilar_name' => 'required|string|max:255',
                    'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'volunteer_count' => 'required|integer',
                    'domicile' => 'required|string|max:255',
                    'rally_point' => 'required|string|max:255',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after_or_equal:start_date',
                    'start_time' => 'required|date_format:H:i',
                    'end_time' => 'required|date_format:H:i|after:start_time',
                    'task' => 'required|string',
                    'criteria' => 'required|string',
                    'registration_limit' => 'required|date|before:start_date',
                ]);


                if ($validator->fails()) {
                    Alert::error('Error', $validator->errors()->first());
                    return redirect()->back()->withInput();
                }

                $data = $request->except(['image_path']);
                if ($request->hasFile('image_path')) {
                    $image = $request->file('image_path');
                    $image_name = $this->uploadFile($image, 'images');
                    $data['image_path'] = $image_name;
                }

                
                $activity = Activity::create($data);

                //Membuat activity date
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));
                while ($startDate <= $endDate) {
                    $activityDate = new DetailActivity();
                    $activityDate->activity_id = $activity->id;
                    $activityDate->activity_date = $startDate->format('Y-m-d');
                    $activityDate->save();
                    $startDate->addDay();
                }

                Alert::success('Success', 'Aktivitas berhasil ditambahkan!');

                return redirect()->route('admin.aktivitas.index');
            // }
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('pages.admin.aktivitas.show', compact('activity'));
    }

    public function korlapshow(Activity $activity)
    {
        return view('pages.korlap.aktivitas.show', compact('activity'));
    }

    public function pimshow(Activity $activity)
    {
        return view('pages.pimpinan.aktivitas.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('pages.admin.aktivitas.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        try {
            $validator = Validator::make($request->all(), [
                'activity_name' => 'required|string|max:255',
                'pilar_name' => 'required|string|max:255',
                'volunteer_count' => 'required|integer',
                'domicile' => 'required|string|max:255',
                'rally_point' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
                'task' => 'required|string',
                'criteria' => 'required|string',
                'registration_limit' => 'required|date|before:start_date',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->first());
                return redirect()->back()->withInput();
            }

            $data = $request->except(['image_path']);

            if ($request->hasFile('image_path')) {
                $image = $request->file('image_path');
                $image_name = $this->uploadFile($image, 'images');
                $data['image_path'] = $image_name;
            }

            $activity->update($data);
            Alert::success('Success', 'Aktivitas berhasil diperbarui!');

            return redirect()->route('admin.aktivitas.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        try {
            $activity->delete();
            Alert::success('Success', 'Aktivitas berhasil dihapus!');

            return redirect()->route('admin.aktivitas.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }
}
