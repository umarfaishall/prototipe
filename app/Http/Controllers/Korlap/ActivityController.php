<?php

namespace App\Http\Controllers\Korlap;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::query()->latest()->paginate(10);
        return view('pages.korlap.aktivitas.index', compact('activities'));
        // return view()->namespace('korlap')->make('pages.korlap.aktivitas.index', compact('activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('pages.korlap.aktivitas.show', compact('activity'));
    }

}
