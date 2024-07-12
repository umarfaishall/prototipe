<?php

namespace App\Http\Controllers\Korlap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.korlap.dashboardkor');
    }
}
