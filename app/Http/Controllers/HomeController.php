<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $heroSettings = Setting::getByGroup('hero');

        return view('welcome', [
            'heroSettings' => $heroSettings,
        ]);
    }
}
