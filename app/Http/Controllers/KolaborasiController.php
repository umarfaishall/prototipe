<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityRegistration;
use Illuminate\Http\Request;

class KolaborasiController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate(12);
        return view('pages.kolaborasi.index', compact('activities'));
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        if (!$activity) {
            return redirect()->route('kolaborasi');
        }

        $registrations = ActivityRegistration::where('activity_id', $id)
            ->where('status', '!=', 'rejected')
            ->get();

        $registrationCount = $registrations->count();

        return view('pages.kolaborasi.show', compact('activity', 'registrations', 'registrationCount'));
    }
}
