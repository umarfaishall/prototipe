<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityRegistration;
use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    public function index()
    {
        // $relawans = ActivityRegistration::where('activity_id', $id)->with('user')->paginate(10);
        return view('pages.korlap.tugas.index');
    }
}