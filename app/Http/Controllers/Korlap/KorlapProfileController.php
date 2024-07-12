<?php

namespace App\Http\Controllers\Korlap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('pages.korlap.profile');
    }
}
