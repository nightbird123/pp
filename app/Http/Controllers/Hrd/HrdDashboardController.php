<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;

class HrdDashboardController extends Controller
{
    public function index()
    {
        return view('hrd.index'); // ke resources/views/hrd/index.blade.php
    }
}
