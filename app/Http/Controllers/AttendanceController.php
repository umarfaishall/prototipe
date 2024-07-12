<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //
    public function korlapindex()
    {
        return view('pages.korlap.tugas.index');
    }
}