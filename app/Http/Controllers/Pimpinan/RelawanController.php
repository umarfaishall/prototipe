<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relawans = User::where('role', 'user')->latest()->paginate(10);
        return view('pages.pimpinan.relawan.index', compact('relawans'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }
}
