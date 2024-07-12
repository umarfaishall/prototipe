<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::query()->latest()->paginate(10);
        return view('pages.pimpinan.aktivitas.index', compact('activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('pages.pimpinan.aktivitas.show', compact('activity'));
    }

}
